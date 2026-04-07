<?php
// Require autoload của Composer để nạp Dompdf
require_once 'config.php';
require_once 'vendor/autoload.php';
// Cập nhật đường dẫn file database.php của bạn cho đúng
require_once 'includes/database.php'; 


use Dompdf\Dompdf;
use Dompdf\Options;

// 1. Lấy và kiểm tra Campaign ID
$campaign_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($campaign_id <= 0) {
    die("ID chiến dịch không hợp lệ.");
}

global $conn; // Biến PDO từ file database.php

try {
    // 2. Lấy thông tin chung của Chiến dịch & Tổ chức
    $stmt_camp = $conn->prepare("
        SELECT c.*, o.org_name 
        FROM CharityCampaign c
        JOIN CharityOrganization o ON c.org_id = o.org_id
        WHERE c.campaign_id = :id
    ");
    $stmt_camp->execute([':id' => $campaign_id]);
    $campaign = $stmt_camp->fetch(PDO::FETCH_ASSOC);

    if (!$campaign) {
        die("Không tìm thấy thông tin chiến dịch.");
    }

    // 3. Lấy lịch sử Quyên góp (Thu)
    $stmt_donations = $conn->prepare("
        SELECT d.donation_time, d.amount, d.message, dn.full_name 
        FROM Donation d
        LEFT JOIN Donor dn ON d.donor_id = dn.donor_id
        WHERE d.campaign_id = :id
        ORDER BY d.donation_time ASC
    ");
    $stmt_donations->execute([':id' => $campaign_id]);
    $donations = $stmt_donations->fetchAll(PDO::FETCH_ASSOC);

    // Tính tổng thu
    $total_income = 0;
    foreach ($donations as $d) {
        $total_income += $d['amount'];
    }

    // 4. Lấy lịch sử Giải ngân / Mua hàng (Chi)
    $stmt_expenses = $conn->prepare("
        SELECT fa.allocation_date, fa.amount AS allocated_amount, b.full_name AS beneficiary_name, 
               ps.total_amount AS spent_amount, ps.note AS purchase_note, ps.id_ps
        FROM FundAllocation fa
        LEFT JOIN Beneficiary b ON fa.beneficiary_id = b.beneficiary_id
        LEFT JOIN PurchaseSlip ps ON fa.allocation_id = ps.allocation_id
        WHERE fa.campaign_id = :id
        ORDER BY fa.allocation_date ASC
    ");
    $stmt_expenses->execute([':id' => $campaign_id]);
    $expenses = $stmt_expenses->fetchAll(PDO::FETCH_ASSOC);

    // Tính tổng chi (dựa trên phiếu mua hàng thực tế, nếu không có thì lấy tiền phân bổ)
    $total_expense = 0;
    foreach ($expenses as $e) {
        $total_expense += ($e['spent_amount'] > 0) ? $e['spent_amount'] : $e['allocated_amount'];
    }

    $balance = $total_income - $total_expense;

    // 5. Chuẩn bị chuỗi HTML để xuất PDF
    // Lưu ý: Sử dụng font 'DejaVu Sans' để hỗ trợ hiển thị tiếng Việt UTF-8 không bị lỗi font
    $html = '
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Sao kê chiến dịch</title>
        <style>
            body { font-family: "DejaVu Sans", sans-serif; font-size: 12px; color: #333; }
            h1, h2, h3 { text-align: center; color: #1a56db; }
            .header-info { margin-bottom: 20px; border-bottom: 2px solid #1a56db; padding-bottom: 10px; }
            .header-info p { margin: 5px 0; }
            table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
            th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
            th { background-color: #f3f4f6; font-weight: bold; }
            .text-right { text-align: right; }
            .text-center { text-align: center; }
            .summary-box { background-color: #f8fafc; border: 1px solid #cbd5e1; padding: 15px; margin-bottom: 20px; }
        </style>
    </head>
    <body>

        <h1>BÁO CÁO SAO KÊ CHIẾN DỊCH TỪ THIỆN</h1>
        
        <div class="header-info">
            <p><strong>Tổ chức thực hiện:</strong> ' . htmlspecialchars($campaign['org_name']) . '</p>
            <p><strong>Tên chiến dịch:</strong> ' . htmlspecialchars($campaign['campaign_name']) . '</p>
            <p><strong>Thời gian:</strong> ' . date('d/m/Y', strtotime($campaign['start_date'])) . ' - ' . date('d/m/Y', strtotime($campaign['end_date'])) . '</p>
            <p><strong>Mục tiêu huy động:</strong> ' . number_format($campaign['target_amount'], 0, ',', '.') . ' VNĐ</p>
            <p><strong>Trạng thái:</strong> ' . ucfirst($campaign['status']) . '</p>
        </div>

        <div class="summary-box">
            <h3>TỔNG QUAN TÀI CHÍNH</h3>
            <p><strong>Tổng tiền quyên góp (Thu):</strong> <span style="color: green;">' . number_format($total_income, 0, ',', '.') . ' VNĐ</span></p>
            <p><strong>Tổng tiền giải ngân (Chi):</strong> <span style="color: red;">' . number_format($total_expense, 0, ',', '.') . ' VNĐ</span></p>
            <p><strong>Số dư hiện tại:</strong> <strong>' . number_format($balance, 0, ',', '.') . ' VNĐ</strong></p>
        </div>

        <h2>I. LỊCH SỬ NHẬN QUYÊN GÓP (THU)</h2>
        <table>
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th width="20%">Thời gian</th>
                    <th width="25%">Người đóng góp</th>
                    <th width="20%" class="text-right">Số tiền (VNĐ)</th>
                    <th width="30%">Lời nhắn</th>
                </tr>
            </thead>
            <tbody>';
            
    if (count($donations) > 0) {
        $stt = 1;
        foreach ($donations as $d) {
            $donor_name = htmlspecialchars($d['full_name'] ?? 'Nhà hảo tâm ẩn danh');
            $html .= '
                <tr>
                    <td class="text-center">' . $stt++ . '</td>
                    <td>' . date('d/m/Y H:i:s', strtotime($d['donation_time'])) . '</td>
                    <td>' . $donor_name . '</td>
                    <td class="text-right">' . number_format($d['amount'], 0, ',', '.') . '</td>
                    <td>' . htmlspecialchars($d['message'] ?? '') . '</td>
                </tr>';
        }
    } else {
        $html .= '<tr><td colspan="5" class="text-center">Chưa có lượt quyên góp nào.</td></tr>';
    }

    $html .= '
            </tbody>
        </table>

        <h2>II. LỊCH SỬ GIẢI NGÂN & MUA HÀNG (CHI)</h2>
        <table>
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th width="20%">Thời gian</th>
                    <th width="25%">Người hưởng lợi</th>
                    <th width="20%" class="text-right">Số tiền (VNĐ)</th>
                    <th width="30%">Nội dung / Ghi chú</th>
                </tr>
            </thead>
            <tbody>';

    if (count($expenses) > 0) {
        $stt = 1;
        foreach ($expenses as $e) {
            $beneficiary = htmlspecialchars($e['beneficiary_name'] ?? 'Chưa xác định');
            // Nếu đã có phiếu mua hàng thì lấy thông tin phiếu mua hàng, nếu không thì lấy thông tin phân bổ quỹ
            $amount = $e['spent_amount'] > 0 ? $e['spent_amount'] : $e['allocated_amount'];
            $note = $e['purchase_note'] ? 'Mã phiếu: PS-' . $e['id_ps'] . ' | ' . htmlspecialchars($e['purchase_note']) : 'Cấp vốn hỗ trợ trực tiếp';

            $html .= '
                <tr>
                    <td class="text-center">' . $stt++ . '</td>
                    <td>' . date('d/m/Y', strtotime($e['allocation_date'])) . '</td>
                    <td>' . $beneficiary . '</td>
                    <td class="text-right">' . number_format($amount, 0, ',', '.') . '</td>
                    <td>' . $note . '</td>
                </tr>';
        }
    } else {
        $html .= '<tr><td colspan="5" class="text-center">Chưa có khoản chi nào được ghi nhận.</td></tr>';
    }

    $html .= '
            </tbody>
        </table>

        <p style="text-align: right; margin-top: 30px;">
            <em>Sao kê được trích xuất tự động từ hệ thống vào lúc ' . date('d/m/Y H:i:s') . '</em>
        </p>
    </body>
    </html>';

    // 6. Khởi tạo Dompdf và xuất file
    $options = new Options();
    $options->set('isRemoteEnabled', true); // Cho phép tải CSS/Font từ bên ngoài nếu cần
    $options->set('defaultFont', 'DejaVu Sans'); // Set font mặc định

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);

    // Kích thước giấy A4, xoay dọc
    $dompdf->setPaper('A4', 'portrait');

    // Render HTML thành PDF
    $dompdf->render();

    // Xuất file PDF ra trình duyệt để người dùng tải về
    // Tên file có dạng: Sao_ke_chien_dich_1.pdf
    $dompdf->stream("Sao_ke_chien_dich_{$campaign_id}.pdf", [
        "Attachment" => true // true: Tải về máy, false: Mở xem trực tiếp trên trình duyệt
    ]);
    header("Location: modules/campaign_detail/?id=".$campaign_id);
} catch (PDOException $e) {
    die("Lỗi kết nối CSDL: " . $e->getMessage());
}
// header("Location: modules/campaign_detail/?id=".$campaign_id);
?>