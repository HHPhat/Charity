<?php
session_start();
require_once '../../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Kiểm tra tổ chức (Phải đăng nhập với quyền tổ chức mới có org_id)
    if (!isset($_SESSION['org_id'])) {
        die("<script>alert('Vui lòng đăng nhập với tài khoản tổ chức từ thiện!'); history.back();</script>");
    }
    $org_id = $_SESSION['org_id'];

    // 2. Lấy dữ liệu form
    $campaign_name = $_POST['campaign_name'] ?? '';
    
    // Gộp tóm tắt và chi tiết vào chung trường description
    $summary = trim($_POST['summary'] ?? '');
    $detailed = trim($_POST['detailed_context'] ?? '');
    $description = "\nChi tiết:\n" . $detailed;
    $short_description="Tóm tắt:\n" . $summary ;
    $target_amount = floatval($_POST['target_amount'] ?? 0);
    
    // Cài đặt ngày tháng và trạng thái
    $start_date = date('Y-m-d H:i:s');
    $end_date_input = $_POST['end_date'] ?? ''; 
    $end_date = $end_date_input . ' 23:59:59'; // Ngày kết thúc vào lúc cuối ngày
    $status = 'ongoing';

    try {
        global $conn;
        $conn->beginTransaction();

        // 3. THÊM VÀO BẢNG CharityCampaign
        $campaign_id = insert_charity_campaign($campaign_name,$short_description, $description, $target_amount, $start_date, $end_date, $status, $org_id);

        // 4. THÊM VÀO BẢNG FundAllocation
        $beneficiary_id = rand(1, 5);
        $allocation_date = $end_date; 
        
        insert_fund_allocation($target_amount, $allocation_date, $campaign_id, $beneficiary_id);

        // 5. XỬ LÝ ẢNH BÌA (Tạo folder và di chuyển ảnh)
        if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
            
            // Tìm đường dẫn gốc của project
            $document_root = $_SERVER['DOCUMENT_ROOT'];
            
            // Thư mục đích: /Charity/templates/assets/image/campaigns/{id}/
            $upload_dir = $document_root . "/Charity/templates/assets/image/campaigns/{$campaign_id}/";

            // Nếu folder chưa tồn tại thì tạo mới
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Tên file theo yêu cầu: campaign_{id}.jpg
            $file_dest = $upload_dir . "campaign_{$campaign_id}.jpg";
            $file_tmp = $_FILES['cover_image']['tmp_name'];

            // Di chuyển file tạm vào folder đích
            if(!move_uploaded_file($file_tmp, $file_dest)) {
                throw new Exception("Không thể lưu ảnh bìa vào hệ thống!");
            }
        }

        // Cam kết hoàn tất mọi thứ
        $conn->commit();
        header("Location: ../fund_allocation/?id=".$org_id);  
        echo "<script>
                alert('Khởi tạo chiến dịch thành công!'); 
                window.location.href = '../fund_allocation/?id=".$org_id."; // Trở về trang danh sách chiến dịch
              </script>";

    } catch (Exception $e) {
        $conn->rollBack();
        die("Lỗi: " . $e->getMessage());
    }
} else {
    die("Truy cập không hợp lệ!");
    header("Location: ../fund_allocation/?id=".$org_id); 
}
?>