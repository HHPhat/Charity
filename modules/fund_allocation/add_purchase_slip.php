<?php
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

    try {
        // Bắt đầu Transaction để tránh dữ liệu lưu bị lỗi giữa chừng
        global $conn;
        $conn->beginTransaction();

        // 3. Insert bảng PurchaseSlip
        $id_ps = insert_purchase_slip($purchase_date, $total_amount_backend, $note, $allocation_id);

        // 4. Insert vòng lặp vào bảng PurchaseOrderDetails
        foreach ($valid_details as $item) {
            insert_purchase_order_detail(
                $item['qty'], 
                $item['price'], 
                $item['into_money'], 
                $id_ps, 
                $item['product_id']
            );
        }

        // Cam kết hoàn tất lưu dữ liệu
        $conn->commit();
        echo "<script>alert('Lập phiếu mua hàng thành công!'); window.location.href='../';</script>";

    } catch (Exception $e) {
        $conn->rollBack();
        die("Lỗi Database: " . $e->getMessage());
    }
} else {
    die("Yêu cầu không hợp lệ.");
}
?>