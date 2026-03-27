<?php
    $host = 'localhost';
    $dbname = 'Charity';
    $db_username = 'root'; // Mặc định của XAMPP/WAMP
    $db_password = '';     // Mặc định không có mật khẩu

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $db_username, $db_password);
        // Thiết lập chế độ báo lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Lỗi kết nối CSDL: " . $e->getMessage());
    }
?>