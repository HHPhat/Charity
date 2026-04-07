<?php
    // if (!defined('_HIENU')){
    //     die('Truy cập không hợp lệ');
    // }
    require_once 'connect.php';

    function get_all_donors(){
        global $conn;
        $sql = "SELECT * FROM DONOR";
        $stm = $conn -> prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

// Hàm 1: Đếm tổng số chiến dịch (Có hỗ trợ tìm kiếm)
    function get_total_campaigns_count($search = "") {
        global $conn;
        $sql = "SELECT COUNT(*) as total FROM CharityCampaign c
                INNER JOIN CharityOrganization o ON c.org_id = o.org_id";
                
        // Nếu có từ khóa, thêm điều kiện WHERE tìm theo tên hoặc mô tả
        if (!empty($search)) {
            $sql .= " WHERE c.campaign_name LIKE :search OR c.description LIKE :search";
        }
        
        $stm = $conn->prepare($sql);
        
        if (!empty($search)) {
            $stm->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }
        
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    // Hàm 2: Lấy dữ liệu phân trang (Có hỗ trợ tìm kiếm)
    function get_campaigns_paginated($limit, $offset, $search = "") {
        global $conn;
        $sql = "SELECT c.*, o.org_name 
                FROM CharityCampaign c
                INNER JOIN CharityOrganization o ON c.org_id = o.org_id";
                
        // Nếu có từ khóa, thêm điều kiện WHERE
        if (!empty($search)) {
            $sql .= " WHERE c.campaign_name LIKE :search OR c.description LIKE :search";
        }
        
        $sql .= " ORDER BY c.start_date DESC LIMIT :limit OFFSET :offset";
                
        $stm = $conn->prepare($sql);
        
        if (!empty($search)) {
            $stm->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }
        $stm->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stm->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_user_donated_campaigns($donor_id) {
    global $conn;
    // Lấy thông tin chiến dịch, tổ chức, ngày quyên góp sớm nhất và tổng tiền quyên góp của user này
    $sql = "SELECT 
                c.campaign_id, 
                o.org_name, 
                c.campaign_name, 
                c.end_date, 
                c.target_amount,
                MIN(d.donation_time) AS first_donation_time, 
                SUM(d.amount) AS total_donated
            FROM Donation d
            INNER JOIN CharityCampaign c ON d.campaign_id = c.campaign_id
            INNER JOIN CharityOrganization o ON c.org_id = o.org_id
            WHERE d.donor_id = :donor_id
            GROUP BY c.campaign_id, o.org_name, c.campaign_name, c.end_date, c.target_amount
            ORDER BY first_donation_time DESC";
            
    $stm = $conn->prepare($sql);
    $stm->bindValue(':donor_id', $donor_id, PDO::PARAM_INT);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

    // 1. Hàm lấy chi tiết chiến dịch kèm theo tổng quyên góp và tổng số người tham gia
function get_campaign_detail($campaign_id) {
    global $conn;
    $sql = "SELECT 
                c.*, 
                o.org_name,
                COALESCE(SUM(d.amount), 0) AS total_donated,
                COUNT(DISTINCT d.donor_id) AS total_donors
            FROM CharityCampaign c
            LEFT JOIN CharityOrganization o ON c.org_id = o.org_id
            LEFT JOIN Donation d ON c.campaign_id = d.campaign_id
            WHERE c.campaign_id = :id
            GROUP BY c.campaign_id, o.org_name";
            
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', (int)$campaign_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// 2. Hàm lấy danh sách lịch sử quyên góp của chiến dịch (Mới nhất xếp trước)
function get_campaign_donors($campaign_id, $limit = 5) {
    global $conn;
    $sql = "SELECT 
                dn.full_name, 
                d.amount,
                d.message, 
                d.donation_time, 
                d.donation_id
            FROM Donation d
            INNER JOIN Donor dn ON d.donor_id = dn.donor_id
            WHERE d.campaign_id = :id
            ORDER BY d.donation_time DESC
            LIMIT :limit";
            
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', (int)$campaign_id, PDO::PARAM_INT);
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 3. Hàm phụ trợ: Tính thời gian trôi qua (Ví dụ: 2 giờ trước, 3 ngày trước)
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm', 'm' => 'tháng', 'w' => 'tuần',
        'd' => 'ngày', 'h' => 'giờ', 'i' => 'phút', 's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v;
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
}

// ... Các kết nối CSDL hiện tại của bạn (biến $conn) ...

// Lấy danh sách sản phẩm
function get_all_products() {
    global $conn;
    $sql = "SELECT id_product, nam_product, unit FROM Product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Lấy danh sách cửa hàng / nhà cung cấp
function get_all_shops() {
    global $conn;
    $sql = "SELECT id_shop, name_shop FROM Shop";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Thêm mới phiếu mua hàng
function insert_purchase_slip($purchase_date, $total_amount, $note, $allocation_id) {
    global $conn;
    $sql = "INSERT INTO PurchaseSlip (purchase_date, total_amount, note, allocation_id) 
            VALUES (:purchase_date, :total_amount, :note, :allocation_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':purchase_date' => $purchase_date,
        ':total_amount' => $total_amount,
        ':note' => $note,
        ':allocation_id' => $allocation_id
    ]);
    return $conn->lastInsertId(); // Trả về id_ps vừa được tạo
}

// Thêm chi tiết phiếu mua hàng
function insert_purchase_order_detail($quantity, $price, $into_money, $id_ps, $id_product) {
    global $conn;
    $sql = "INSERT INTO PurchaseOrderDetails (quantity, price, into_money, id_ps, id_product) 
            VALUES (:quantity, :price, :into_money, :id_ps, :id_product)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([
        ':quantity' => $quantity,
        ':price' => $price,
        ':into_money' => $into_money,
        ':id_ps' => $id_ps,
        ':id_product' => $id_product
    ]);
}

// Hàm lấy danh sách chiến dịch theo org_id (có kèm bộ lọc và phân trang)
function get_campaigns_by_org($org_id, $filter = 'all', $limit = 5, $offset = 0) {
    global $conn;
    
    // Xây dựng điều kiện HAVING dựa trên bộ lọc
    $having = "";
    if ($filter === 'active') {
        // Đang hoạt động: Chưa hết hạn và chưa đủ mục tiêu
        $having = "HAVING c.end_date >= NOW() AND raised_amount < c.target_amount";
    } elseif ($filter === 'completed') {
        // Đã hoàn thành: Số tiền >= Mục tiêu
        $having = "HAVING raised_amount >= c.target_amount";
    }

    $sql = "SELECT 
                c.*, 
                o.org_name,
                COALESCE(SUM(d.amount), 0) AS raised_amount
            FROM CharityCampaign c
            INNER JOIN CharityOrganization o ON c.org_id = o.org_id
            LEFT JOIN Donation d ON c.campaign_id = d.campaign_id
            WHERE c.org_id = :org_id
            GROUP BY c.campaign_id, o.org_name
            $having
            ORDER BY c.start_date DESC
            LIMIT :limit OFFSET :offset";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':org_id', (int)$org_id, PDO::PARAM_INT);
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm đếm tổng số chiến dịch để làm phân trang
function count_campaigns_by_org($org_id, $filter = 'all') {
    global $conn;
    
    $having = "";
    if ($filter === 'active') {
        $having = "HAVING c.end_date >= NOW() AND raised_amount < c.target_amount";
    } elseif ($filter === 'completed') {
        $having = "HAVING raised_amount >= c.target_amount";
    }

    $sql = "SELECT COUNT(*) FROM (
                SELECT c.campaign_id, c.end_date, c.target_amount, COALESCE(SUM(d.amount), 0) AS raised_amount
                FROM CharityCampaign c
                LEFT JOIN Donation d ON c.campaign_id = d.campaign_id
                WHERE c.org_id = :org_id
                GROUP BY c.campaign_id
                $having
            ) AS subquery";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':org_id', (int)$org_id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchColumn();
}

// Để thực hiện việc tự động tạo Phiếu giao hàng (DeliveryNote) và ghi nhận Chi tiết giao hàng (DetectionDetails) ngay sau khi lập Phiếu mua hàng, chúng ta sẽ làm theo 2 bước: Thêm hàm vào file database và gọi hàm đó trong luồng xử lý.

// Bước 1: Thêm các hàm vào file ../../includes/database.php
// Bạn hãy mở file database.php và bổ sung 3 hàm dưới đây. Ngoài 2 hàm thêm dữ liệu, chúng ta cần 1 hàm phụ để lấy ra beneficiary_id (người hưởng lợi) từ cái allocation_id ban đầu.

// PHP

// ... Các hàm cũ của bạn ...

// 1. Hàm tạo Phiếu giao hàng (DeliveryNote)
function insert_delivery_note($date, $note, $id_ps) {
    global $conn;
    $sql = "INSERT INTO DeliveryNote (date, note, id_ps) 
            VALUES (:date, :note, :id_ps)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':date' => $date,
        ':note' => $note,
        ':id_ps' => $id_ps
    ]);
    return $conn->lastInsertId(); // Trả về id_dn vừa tạo
}

// 2. Hàm tạo Chi tiết giao hàng (DetectionDetails)
function insert_detection_detail($quantity, $id_dn, $beneficiary_id) {
    global $conn;
    $sql = "INSERT INTO DetectionDetails (quantity, id_dn, beneficiary_id) 
            VALUES (:quantity, :id_dn, :beneficiary_id)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([
        ':quantity' => $quantity,
        ':id_dn' => $id_dn,
        ':beneficiary_id' => $beneficiary_id
    ]);
}

// 3. Hàm lấy người hưởng lợi từ kế hoạch phân bổ (để biết giao cho ai)
function get_beneficiary_by_allocation($allocation_id) {
    global $conn;
    $sql = "SELECT beneficiary_id FROM FundAllocation WHERE allocation_id = :allocation_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':allocation_id', (int)$allocation_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchColumn(); // Trả về ID của người hưởng lợi
}
// Hàm lấy dữ liệu tài chính của chiến dịch (Tổng quyên góp & Tổng đã chi)
function get_campaign_financials($campaign_id) {
    global $conn;
    $sql = "SELECT 
                (SELECT COALESCE(SUM(amount), 0) 
                 FROM Donation 
                 WHERE campaign_id = :id) AS total_donated,
                 
                (SELECT COALESCE(SUM(ps.total_amount), 0) 
                 FROM PurchaseSlip ps
                 INNER JOIN FundAllocation fa ON ps.allocation_id = fa.allocation_id
                 WHERE fa.campaign_id = :id) AS total_spent";
                 
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', (int)$campaign_id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Lấy danh sách giao dịch (Quyên góp + Giải ngân) của chiến dịch
function get_campaign_transactions($campaign_id, $limit = 6, $offset = 0) {
    global $conn;
    $sql = "
        (SELECT 
            dn.full_name AS entity_name, 
            d.message AS note, 
            d.amount AS amount, 
            d.donation_time AS transaction_time, 
            'donation' AS transaction_type 
        FROM Donation d
        LEFT JOIN Donor dn ON d.donor_id = dn.donor_id
        WHERE d.campaign_id = :id1)
        
        UNION ALL
        
        (SELECT 
            b.full_name AS entity_name, 
            ps.note AS note, 
            ps.total_amount AS amount, 
            ps.purchase_date AS transaction_time, 
            'expense' AS transaction_type 
        FROM PurchaseSlip ps
        INNER JOIN FundAllocation fa ON ps.allocation_id = fa.allocation_id
        LEFT JOIN Beneficiary b ON fa.beneficiary_id = b.beneficiary_id
        WHERE fa.campaign_id = :id2)
        
        ORDER BY transaction_time DESC
        LIMIT :limit OFFSET :offset
    ";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id1', (int)$campaign_id, PDO::PARAM_INT);
    $stmt->bindValue(':id2', (int)$campaign_id, PDO::PARAM_INT);
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm thêm chiến dịch mới
function insert_charity_campaign($campaign_name, $description, $target_amount, $start_date, $end_date, $status, $org_id) {
    global $conn;
    $sql = "INSERT INTO CharityCampaign (campaign_name, description, target_amount, start_date, end_date, status, org_id) 
            VALUES (:name, :desc, :target, :start, :end, :status, :org_id)";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name'   => $campaign_name,
        ':desc'   => $description,
        ':target' => $target_amount,
        ':start'  => $start_date,
        ':end'    => $end_date,
        ':status' => $status,
        ':org_id' => $org_id
    ]);
    
    return $conn->lastInsertId(); // Trả về ID tự tăng của chiến dịch vừa tạo
}

// Hàm thêm phân bổ quỹ
function insert_fund_allocation($amount, $allocation_date, $campaign_id, $beneficiary_id) {
    global $conn;
    $sql = "INSERT INTO FundAllocation (amount, allocation_date, campaign_id, beneficiary_id) 
            VALUES (:amount, :date, :campaign_id, :beneficiary_id)";
    
    $stmt = $conn->prepare($sql);
    return $stmt->execute([
        ':amount'         => $amount,
        ':date'           => $allocation_date,
        ':campaign_id'    => $campaign_id,
        ':beneficiary_id' => $beneficiary_id
    ]);
}
?>