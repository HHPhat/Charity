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
?>