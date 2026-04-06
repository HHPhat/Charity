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
?>