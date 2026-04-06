<?php
session_start(); // Đưa lên đầu file để đảm bảo session luôn sẵn sàng
require_once '../../includes/connect.php'; 

// Nếu người dùng đã đăng nhập từ trước
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: ../../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_input = trim($_POST['email']);
    $password_input = trim($_POST['password']);

    // Kiểm tra điền đầy đủ
    if (empty($account_input) || empty($password_input)) {
        $_SESSION['message'] = "Vui lòng điền đầy đủ tất cả các trường.";
        $_SESSION['messageType'] = "error";
        header("Location: ../../pages/login.php");
        exit();
    } 

    try {
        // SỬA SQL: Dùng tham số hóa :account và sửa alias thành a.account
        $sql = "SELECT 
                    a.account, 
                    a.password, 
                    a.status, 
                    a.role, 
                    d.donor_id, 
                    d.full_name, 
                    d.email, 
                    d.phone,
                    d.citizen_id
                FROM Account a
                INNER JOIN Donor d ON a.account = d.account 
                WHERE a.account = :account";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':account', $account_input, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if ($user['status'] !== 'Active') {
                $_SESSION['message'] = "Tài khoản của bạn đã bị khóa!";
                $_SESSION['messageType'] = "error";
                header("Location: ../../pages/login.php");
                exit();
            }

            if (password_verify($password_input, $user['password'])) {
                // Đăng nhập thành công
                $_SESSION['logged_in'] = true;
                $_SESSION['account_id'] = $user['account'];
                $_SESSION['role'] = $user['role'];
                // SỬA: Phải đúng tên cột trong DB là full_name
                $_SESSION['full_name'] = $user['full_name']; 
                $_SESSION['donor_id'] = $user['donor_id'];
                $_SESSION['donor_email']= $user['email'];
                $_SESSION['donor_phone']= $user['phone'];
                $_SESSION['donor_citizenid']= $user['citizen_id'];
                $_SESSION['account_status']= $user['status'];
                
          

          
                
                header("Location: ../../index.php");
                exit();
            } else {
                $_SESSION['message'] = "Mật khẩu không chính xác!";
                $_SESSION['messageType'] = "error";
                header("Location: ../../pages/login.php");
                exit();
            }
        } else {
            $_SESSION['message'] = "Tài khoản không tồn tại!";
            $_SESSION['messageType'] = "error";
            header("Location: ../../pages/login.php");
            exit();
        }
    } catch(PDOException $e) {
        $_SESSION['message'] = "Lỗi kết nối CSDL: " . $e->getMessage();
        $_SESSION['messageType'] = "error";
        header("Location: ../../pages/login.php");
        exit();
    }

}
