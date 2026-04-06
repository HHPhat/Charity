<?php
session_start();
require_once '../../includes/connect.php';

// Check login
if (!isset($_SESSION['donor_id'])) {
    header("Location: ../../pages/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $donor_id = $_SESSION['donor_id'];

    $full_name  = trim($_POST['full_name'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $phone      = trim($_POST['phone'] ?? '');
    $citizen_id = trim($_POST['citizen_id'] ?? '');

    // ===== VALIDATE =====
    if (empty($full_name) || empty($email)) {
        $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin";
        header("Location: profile.php");
        exit();
    }

    try {
        $sql = "UPDATE Donor 
                SET full_name = :full_name,
                    email = :email,
                    phone = :phone,
                    citizen_id = :citizen_id
                WHERE donor_id = :donor_id";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':full_name'  => $full_name,
            ':email'      => $email,
            ':phone'      => $phone,
            ':citizen_id' => $citizen_id,
            ':donor_id'   => $donor_id
        ]);

        // ✅ UPDATE SESSION ĐÚNG THEO LOGIN.PHP
        $_SESSION['full_name']         = $full_name;
        $_SESSION['donor_email']      = $email;
        $_SESSION['donor_phone']      = $phone;
        $_SESSION['donor_citizenid']  = $citizen_id;

        $_SESSION['success'] = "Cập nhật thành công!";
        
    } catch (PDOException $e) {
        $_SESSION['error'] = "Lỗi cập nhật!";
    }

    header("Location: index.php");
    exit();
}