<?php
session_start();
require_once '../../includes/connect.php';

if (!isset($_SESSION['account_id'])) {
    http_response_code(403);
    echo 'Bạn chưa đăng nhập!';
    exit();
}

$account_id = $_SESSION['account_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'toggle') {
        try {
            // Lấy trạng thái hiện tại
            $stmt = $conn->prepare("SELECT status FROM Account WHERE account = :account");
            $stmt->bindValue(':account', $account_id, PDO::PARAM_STR);
            $stmt->execute();
            $currentStatus = $stmt->fetchColumn();

            // Toggle trạng thái
            $newStatus = ($currentStatus === 'Active') ? 'Deactive' : 'Active';

            // Cập nhật DB
            $stmt = $conn->prepare("UPDATE Account SET status = :status WHERE account = :account");
            $stmt->bindValue(':status', $newStatus);
            $stmt->bindValue(':account', $account_id);
            $stmt->execute();

            // Cập nhật session
            $_SESSION['account_status'] = $newStatus;

            // Trả về status mới
            echo $newStatus;

        } catch (PDOException $e) {
            http_response_code(500);
            echo "Lỗi: " . $e->getMessage();
        }
    }
}