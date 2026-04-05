<?php
session_start();
// Gọi file kết nối CSDL (hãy đảm bảo đường dẫn đúng với cấu trúc dự án của bạn)
require_once '../../includes/database.php'; 

// 1. Kiểm tra đăng nhập
if (!isset($_SESSION['donor_id']) || empty($_SESSION['donor_id'])) {
    die("<h2 style='color:red; text-align:center'>Vui lòng đăng nhập để thực hiện quyên góp!</h2>");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 2. Lấy dữ liệu từ POST và SESSION
    $amount = isset($_SESSION['amount']) ? $_SESSION['amount'] : 0;
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $donation_time = date('Y-m-d H:i:s');
    
    $donor_id = $_SESSION['donor_id'];
    
    // Lấy campaign_id từ SESSION (Ưu tiên) hoặc từ POST nếu bạn truyền qua thẻ hidden
    $campaign_id = isset($_SESSION['campaign_id']) ? $_SESSION['campaign_id'] : (isset($_POST['campaign_id']) ? $_POST['campaign_id'] : 0);

    // Kiểm tra tính hợp lệ cơ bản
    if ($amount <= 0 || $campaign_id == 0) {
        die("Dữ liệu quyên góp không hợp lệ. Vui lòng thử lại!".$amount."  campaign id:".$campaign_id);
    }

    try {
        global $conn; // Lấy biến kết nối PDO
        
        // Tạo ID ngẫu nhiên cho donation_id (Do trong bảng SQL của bạn không ghi AUTO_INCREMENT)
        // Nếu cột donation_id trong CSDL của bạn đã set AUTO_INCREMENT thì bạn có thể bỏ biến này đi
        $donation_id = intval(time() . rand(10, 99));

        // 3. Chuẩn bị câu lệnh SQL INSERT
        $sql = "INSERT INTO Donation (donation_id, amount, message, donation_time, donor_id, campaign_id) 
                VALUES (:donation_id, :amount, :message, :donation_time, :donor_id, :campaign_id)";
        
        $stmt = $conn->prepare($sql);
        
        // 4. Gán giá trị (Binding values) để chống SQL Injection
        $stmt->bindValue(':donation_id', $donation_id, PDO::PARAM_INT);
        $stmt->bindValue(':amount', $amount, PDO::PARAM_STR);
        $stmt->bindValue(':message', $message, PDO::PARAM_STR);
        $stmt->bindValue(':donation_time', $donation_time, PDO::PARAM_STR);
        $stmt->bindValue(':donor_id', $donor_id, PDO::PARAM_INT);
        $stmt->bindValue(':campaign_id', $campaign_id, PDO::PARAM_INT);

        // 5. Thực thi câu lệnh
        if ($stmt->execute()) {
            
            // (Tuỳ chọn) Xóa campaign_id khỏi session sau khi quyên góp thành công để tránh lưu rác
            unset($_SESSION['campaign_id']);
            unset($_SESSION['campaign_name']);
            unset($_SESSION['org_name']);

            // Hiển thị thông báo thành công bằng SweetAlert2 và chuyển về trang chủ
            echo "<!DOCTYPE html><html lang='vi'><head><meta charset='UTF-8'><title>Hoàn tất</title>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head><body>";
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Thành công!',
                            text: 'Cảm ơn bạn đã quyên góp số tiền " . number_format($amount, 0, ',', '.') . " VNĐ. Sự ủng hộ của bạn rất đáng quý!',
                            icon: 'success',
                            confirmButtonColor: '#00419e'
                        }).then((result) => {
                            if (result.isConfirmed || result.isDismissed) {
                                window.location.href = '../campaign_detail/?id=".$campaign_id ."'; // Điều chỉnh lại đường dẫn về trang chủ
                            }
                        });
                    });
                  </script>";
            echo "</body></html>";
            
        } else {
            echo "Có lỗi xảy ra trong quá trình ghi nhận. Vui lòng liên hệ hỗ trợ.";
        }

    } catch (PDOException $e) {
        die("Lỗi CSDL: " . $e->getMessage());
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>