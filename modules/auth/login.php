
<?php

// Gọi file kết nối CSDL (Đường dẫn tương đối: lùi 2 cấp thư mục auth -> modules -> tới includes)
require_once '../../includes/connect.php'; 
//
session_start();

// Nếu người dùng đã đăng nhập từ trước, tự động chuyển hướng thẳng vào trang chủ (index.php)
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: ../../index.php");
    exit();
}

$error_message = ''; // Biến lưu thông báo lỗi

// Xử lý dữ liệu ngay tại file này khi người dùng bấm Sign In
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_input = trim($_POST['email']);
    $password_input = trim($_POST['password']);

    // Biến lưu đường dẫn quay lại trang login
    $redirect_url = "../../pages/login.php";

    // 1. Kiểm tra điền đầy đủ (Backend validation)
    if (empty($account_input) || empty($password_input)) {
        $_SESSION['message'] = "Vui lòng điền đầy đủ tất cả các trường.";
        $_SESSION['messageType'] = "error";
        header("Location: ../../pages/login.php" );
        exit();
    } 

    try {
        $sql = "SELECT 
    a.account, 
    a.password, 
    a.status, 
    a.role, 
    d.donor_id, 
    d.full_name, 
    d.email, 
    d.phone
FROM Account a
INNER JOIN Donor d ON a.account = d.account where c.account = ".$account_input;
        // $sql = "SELECT account, password, role, status FROM Account WHERE account = :account";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':account', $account_input, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['status'] === 'Active') {
            if (password_verify($password_input, $user['password'])) {
                // Đăng nhập thành công
                $_SESSION['logged_in'] = true;
                $_SESSION['account_id'] = $user['account'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['fullname']=$user['fullname'];
                $_SESSION['donor_id']= $user['donor_id'];
                
                header("Location: ../../index.php");
                exit();
            } else {
                $error_message = "Mật khẩu không chính xác!";
                header("Location: ../../pages/login.php" );
            }
        } else {
            $error_message = "Tài khoản không tồn tại hoặc đã bị khóa!";
            header("Location: ../../pages/login.php" );
        }
    } catch(PDOException $e) {
        $error_message = "Lỗi kết nối CSDL: " . $e->getMessage();
        header("Location: ../../pages/login.php" );
    }
}
?> 
