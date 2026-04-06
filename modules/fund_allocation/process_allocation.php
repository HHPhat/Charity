<?php
session_start();
require_once '../../includes/database.php'; // Điều chỉnh đường dẫn tới file kết nối PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Nhận dữ liệu từ form
    $campaign_id     = intval($_POST['campaign_id']);
    $beneficiary_id  = intval($_POST['beneficiary_id']);
    $amount          = floatval($_POST['amount']);
    $allocation_date = $_POST['allocation_date']; // Có thể format lại thêm giờ: $allocation_date . ' 00:00:00'

    // Validate cơ bản
    if ($amount <= 0 || $campaign_id == 0 || $beneficiary_id == 0 || empty($allocation_date)) {
        die("Dữ liệu không hợp lệ. Vui lòng kiểm tra lại form!");
    }

    try {
        global $conn;

        // Tương tự bảng Donation, nếu cột allocation_id chưa set AUTO_INCREMENT thì cần rand() 
        // Lời khuyên: Hãy vào SQL chạy lệnh `ALTER TABLE FundAllocation MODIFY allocation_id INT AUTO_INCREMENT;`
        
        // 2. Chuẩn bị lệnh Insert vào bảng FundAllocation
        $sql = "INSERT INTO FundAllocation (amount, allocation_date, campaign_id, beneficiary_id) 
                VALUES (:amount, :allocation_date, :campaign_id, :beneficiary_id)";
        
        $stmt = $conn->prepare($sql);
        
        // 3. Bind dữ liệu
        $stmt->bindValue(':amount', $amount, PDO::PARAM_STR);
        $stmt->bindValue(':allocation_date', $allocation_date, PDO::PARAM_STR);
        $stmt->bindValue(':campaign_id', $campaign_id, PDO::PARAM_INT);
        $stmt->bindValue(':beneficiary_id', $beneficiary_id, PDO::PARAM_INT);

        // 4. Thực thi
        if ($stmt->execute()) {
            echo "<script>
                    alert('Đã tạo kế hoạch phân bổ quỹ thành công!');
                    window.location.href = 'manage_allocations.php'; // Trở về trang quản lý
                  </script>";
        } else {
            echo "Lỗi: Không thể lưu kế hoạch phân bổ.";
        }

    } catch (PDOException $e) {
        die("Lỗi cơ sở dữ liệu: " . $e->getMessage());
    }
} else {
    echo "Truy cập không hợp lệ.";
}
?>