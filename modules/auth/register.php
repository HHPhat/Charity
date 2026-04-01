<?php
session_start();

// Gọi file kết nối CSDL (Đường dẫn tương đối: lùi 2 cấp thư mục auth -> modules -> tới includes)
require_once '../../includes/connect.php'; 

// Kiểm tra xem có phải là request POST từ form gửi lên không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy và làm sạch dữ liệu đầu vào
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $cccd = trim($_POST['cccd']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Biến lưu đường dẫn quay lại trang đăng ký
    $redirect_url = "../../pages/register.php";

    // 1. Kiểm tra điền đầy đủ (Backend validation)
    if (empty($full_name) || empty($email) || empty($phone) || empty($cccd) || empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION['message'] = "Vui lòng điền đầy đủ tất cả các trường.";
        $_SESSION['messageType'] = "error";
        header("Location: " . $redirect_url);
        exit();
    } 
    
    // 2. Kiểm tra mật khẩu khớp nhau
    if ($password !== $confirm_password) {
        $_SESSION['message'] = "Mật khẩu xác nhận không khớp.";
        $_SESSION['messageType'] = "error";
        header("Location: " . $redirect_url);
        exit();
    } 
    
    try {
        // ... (phần kiểm tra username/email tồn tại giữ nguyên) ...
        
        // 4. Bắt đầu Transaction
        $conn->beginTransaction();

        // Thêm dữ liệu vào bảng Account
        $hashed_password = md5($password); 
        $creation_date = date('Y-m-d H:i:s');
        $role = 'Donor'; 
        $status = 'Active';

        $sqlAccount = "INSERT INTO Account (account, password, status, creation_date, role) VALUES (?, ?, ?, ?, ?)";
        $stmtAccount = $conn->prepare($sqlAccount);
        $stmtAccount->execute([$username, $hashed_password, $status, $creation_date, $role]);

        // Xử lý donor_id
        $idStmt = $conn->query("SELECT MAX(donor_id) AS max_id FROM Donor");
        $row = $idStmt->fetch(PDO::FETCH_ASSOC);
        $new_donor_id = ($row['max_id']) ? $row['max_id'] + 1 : 1;

        // Thêm dữ liệu vào bảng Donor
        $verification_status = 'Unverified';
        $wallet_address = ''; 

        $sqlDonor = "INSERT INTO Donor (donor_id, full_name, citizen_id, wallet_address, email, phone, verification_status, account) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtDonor = $conn->prepare($sqlDonor);
        $stmtDonor->execute([$new_donor_id, $full_name, $cccd, $wallet_address, $email, $phone, $verification_status, $username]);

        // Hoàn tất Transaction
        $conn->commit();

        // 1. Lưu thông báo thành công
        $_SESSION['message'] = "Đăng ký tài khoản thành công! Vui lòng đăng nhập.";
        $_SESSION['messageType'] = "success";
        
        // 2. Chuyển hướng người dùng (bạn có thể đổi thành pages/register.php nếu muốn ở lại trang cũ)
        header("Location: ../../pages/login.php"); 
        exit();

    } catch (Exception $e) {
        // Lỗi hệ thống: Rollback dữ liệu
        $conn->rollBack();
        
        // 3. Khôi phục thông báo lỗi
        $_SESSION['message'] = "Đã xảy ra lỗi hệ thống: " . $e->getMessage();
        $_SESSION['messageType'] = "error";
        header("Location: ../../pages/register.php");
        exit();
    }
} else {
    // Nếu ai đó cố tình truy cập trực tiếp file này qua thanh địa chỉ (không phải submit form)
    header("Location: ../../pages/register.php");
    exit();
}
?>