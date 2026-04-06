<?php
session_start();
require_once '../../includes/connect.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])){
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];
    $account = $_SESSION['account_id'];

    // Kiểm tra điền đủ
    if(empty($current) || empty($new) || empty($confirm)){
        $_SESSION['error'] = "Vui lòng điền đầy đủ tất cả các trường.";
        header("Location: index.php");
        exit();
    }

    // Kiểm tra confirm
    if($new !== $confirm){
        $_SESSION['error'] = "Mật khẩu mới không khớp với xác nhận.";
        header("Location: index.php");
        exit();
    }

    try {
        // Lấy password cũ từ DB
        $stmt = $conn->prepare("SELECT password FROM Account WHERE account = ?");
        $stmt->execute([$account]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            $_SESSION['error'] = "Tài khoản không tồn tại.";
            header("Location: index.php");
            exit();
        }

        // Kiểm tra current password
        if(!password_verify($current, $user['password'])){
            $_SESSION['error'] = "Mật khẩu hiện tại không đúng.";
            header("Location: index.php");
            exit();
        }

        // Kiểm tra trùng mật khẩu cũ
        if(password_verify($new, $user['password'])){
            $_SESSION['error'] = "Mật khẩu mới không được trùng mật khẩu cũ.";
            header("Location: index.php");
            exit();
        }

        // Hash mật khẩu mới
        $hashed_new = password_hash($new, PASSWORD_DEFAULT);

        // Cập nhật DB
        $update = $conn->prepare("UPDATE Account SET password = ? WHERE account = ?");
        $update->execute([$hashed_new, $account]);

        $_SESSION['success'] = "Đổi mật khẩu thành công!";
        header("Location: index.php");
        exit();

    } catch(PDOException $e){
        $_SESSION['error'] = "Lỗi hệ thống: " . $e->getMessage();
        header("Location: index.php");
        exit();
    }
}
?>