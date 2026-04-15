<?php
session_start(); // Cần thiết để lấy dữ liệu từ $_SESSION
require_once '../../includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Lấy và kiểm tra dữ liệu cơ bản
    $allocation_id = $_POST['allocation_id'] ?? null;
    $id_shop = $_POST['id_shop'] ?? '';
    $user_note = $_POST['note'] ?? '';
    
    // Nối ID shop vào ghi chú (Vì bảng PurchaseSlip không có cột id_shop)
    $note = "Shop ID [$id_shop] - " . $user_note;
    
    $purchase_date = date('Y-m-d H:i:s');
    
    // Mảng dữ liệu các sản phẩm
    $id_products = $_POST['id_products']; // Array
    $quantities  = $_POST['quantities'];   // Array
    $prices      = $_POST['prices'];       // Array (Có chứa dấu chấm)

    // 2. Tính toán tổng tiền ngay trên Backend (Đảm bảo bảo mật)
    $total_amount_backend = 0;
    $valid_details = [];

    for ($i = 0; $i < count($id_products); $i++) {
        $product_id = intval($id_products[$i]);
        $qty = intval($quantities[$i]);
        // Loại bỏ dấu chấm để lấy số nguyên tính toán
        $price = intval(str_replace('.', '', $prices[$i])); 
        
        if ($product_id > 0 && $qty > 0 && $price > 0) {
            $into_money = $qty * $price;
            $total_amount_backend += $into_money;
            
            $valid_details[] = [
                'product_id' => $product_id,
                'qty' => $qty,
                'price' => $price,
                'into_money' => $into_money
            ];
        }
    }

    // Nếu không có sản phẩm nào hợp lệ, báo lỗi
    if (empty($valid_details)) {
        die("<script>alert('Dữ liệu hàng hoá không hợp lệ!'); history.back();</script>");
    }

    // =========================================================================
    // KIỂM TRA NGÂN SÁCH CÒN LẠI TỪ SESSION
    // =========================================================================
    $remaining_budget = isset($_SESSION['remaining_budget']) ? floatval($_SESSION['remaining_budget']) : 0;
    
    if ($total_amount_backend > $remaining_budget) {
        die("<script>
                alert('Số dư của quỹ không đủ để thực hiện phiếu mua hàng!'); 
                window.location.href='../fund_allocation?id=1';
             </script>");
    }
    // =========================================================================

    try {
        // Bắt đầu Transaction để tránh dữ liệu lưu bị lỗi giữa chừng
        global $conn;
        $conn->beginTransaction();

        // 3. Insert bảng PurchaseSlip
        $id_ps = insert_purchase_slip($purchase_date, $total_amount_backend, $note, $allocation_id);

        $total_quantity = 0; // Bổ sung biến đếm tổng số lượng hàng

        // 4. Insert vòng lặp vào bảng PurchaseOrderDetails
        foreach ($valid_details as $item) {
            insert_purchase_order_detail(
                $item['qty'], 
                $item['price'], 
                $item['into_money'], 
                $id_ps, 
                $item['product_id']
            );
            $total_quantity += $item['qty']; // Cộng dồn số lượng
        }

        $beneficiary_id = get_beneficiary_by_allocation($allocation_id);

        if ($beneficiary_id) {
            // 4. Tạo Phiếu giao hàng
            $dn_note = "Giao hàng tự động cho Phiếu mua hàng số: PS-" . $id_ps;
            $id_dn = insert_delivery_note($purchase_date, $dn_note, $id_ps);

            // 5. Ghi chi tiết số lượng hàng hóa được giao cho người hưởng lợi đó
            insert_detection_detail($total_quantity, $id_dn, $beneficiary_id);
        }


        $sqlOrg = "SELECT co.wallet_address, cc.campaign_id
           FROM fundallocation fa
           JOIN charitycampaign cc ON fa.campaign_id = cc.campaign_id
           JOIN charityorganization co ON cc.org_id = co.org_id
           WHERE fa.allocation_id = :allocation_id";

        $stmtOrg = $conn->prepare($sqlOrg);
        $stmtOrg->bindValue(':allocation_id', $allocation_id, PDO::PARAM_INT);
        $stmtOrg->execute();

        $org = $stmtOrg->fetch(PDO::FETCH_ASSOC);

        $org_wallet = $org ? $org['wallet_address'] : 'UNKNOWN';
        $campaign_id = $org ? $org['campaign_id'] : 0;


        $sqlBen = "SELECT wallet_address 
           FROM beneficiary 
           WHERE beneficiary_id = :beneficiary_id";

        $stmtBen = $conn->prepare($sqlBen);
        $stmtBen->bindValue(':beneficiary_id', $beneficiary_id, PDO::PARAM_INT);
        $stmtBen->execute();

        $ben = $stmtBen->fetch(PDO::FETCH_ASSOC);

        $to_account = $ben ? $ben['wallet_address'] : 'UNKNOWN';

        $postData = [
            'campaign_id' => $campaign_id,
            'from_account' => $org_wallet,
            'to_account' => $to_account,
            'amount' => $total_amount_backend,
            'time' => $purchase_date,
            'type' => 'allocate',
            'source' => 'system'
        ];
        
        $ch = curl_init("http://localhost/Charity-main/blockchain/save_block.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        
        $response = curl_exec($ch);
        
        if ($response === false) {
            error_log("Blockchain error: " . curl_error($ch));
        }
        
        curl_close($ch);

        $result = json_decode($response, true);

        if ($response === false || $result['status'] !== 'success') {
            $conn->rollBack();
            die("Lỗi blockchain! Giao dịch bị huỷ.");
        }

        // Cam kết hoàn tất lưu dữ liệu
        $conn->commit();
        echo "<script>
                alert('Lập phiếu mua hàng thành công!'); 
                window.location.href='../fund_allocation';
              </script>";

    } catch (Exception $e) {
        $conn->rollBack();
        die("Lỗi Database: " . $e->getMessage());
    }
} else {
    die("Yêu cầu không hợp lệ.");
}
?>