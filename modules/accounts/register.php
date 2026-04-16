<?php
session_start();
require_once '../../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Kiểm tra trạng thái đăng nhập
    if (!isset($_SESSION['account_id'])) {
        die("<script>alert('Vui lòng đăng nhập tài khoản trước khi thực hiện!'); window.location.href='login.php';</script>");
    }

    $account = $_SESSION['account_id'];
    $org_name = trim($_POST['org_name'] ?? '');
    $tax_code = trim($_POST['tax_code'] ?? '');
    $tos = $_POST['tos'] ?? '';
    $captured_image = $_POST['captured_image'] ?? ''; // Chuỗi Base64 từ JS

    // 2. Kiểm tra các ô input ở Backend
    if (empty($org_name) || empty($tax_code)) {
        die("<script>alert('Vui lòng điền đầy đủ thông tin Tên và Mã số thuế!'); history.back();</script>");
    }
    if (empty($tos)) {
        die("<script>alert('Bạn phải đồng ý với điều khoản dịch vụ!'); history.back();</script>");
    }
    if (empty($captured_image)) {
        die("<script>alert('Vui lòng chụp ảnh xác thực người đại diện!'); history.back();</script>");
    }

    try {
        global $conn;
        $conn->beginTransaction();

        // 3. Thêm dữ liệu vào bảng
        $org_id = insert_charity_organization($org_name, $tax_code, $account);

        // 4. Băm SHA-256 để tạo Wallet Address và Cập nhật lại
        $wallet_string = $org_id . $org_name . $tax_code;
        $wallet_address = hash('sha256', $wallet_string);
        update_org_wallet($org_id, $wallet_address);

        // 5. Xử lý và lưu file ảnh từ Base64
        // Tách header chuỗi (vd: data:image/jpeg;base64,.....)
        $image_parts = explode(";base64,", $captured_image);
        if (count($image_parts) == 2) {
            $image_base64 = base64_decode($image_parts[1]);
            
            // Đường dẫn gốc của project
            $doc_root = $_SERVER['DOCUMENT_ROOT'];
            // Đường dẫn folder sẽ lưu theo ID tổ chức
            $target_dir = $doc_root . "/Charity/templates/uploads/org/{$org_id}";
            
            // Nếu folder chưa tồn tại thì tạo mới
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            // Tên file lưu lại
            $file_path = $target_dir . "/portrait.jpg";
            file_put_contents($file_path, $image_base64);
        }

        $conn->commit();
        echo "<script>
                alert('Đăng ký tổ chức thành công! Vui lòng chờ hệ thống xét duyệt.'); 
                window.location.href = 'index.php'; // Điều hướng về trang chủ
              </script>";

    } catch (Exception $e) {
        $conn->rollBack();
        die("Lỗi Database: " . $e->getMessage());
    }
} else {
    die("Truy cập không hợp lệ!");
}
?>