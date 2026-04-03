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

//     function get_total_campaigns_count() {
//     global $conn;
//     $sql = "SELECT COUNT(*) as total FROM CharityCampaign c
//             INNER JOIN CharityOrganization o ON c.org_id = o.org_id";
//     $stm = $conn->prepare($sql);
//     $stm->execute();
//     $result = $stm->fetch(PDO::FETCH_ASSOC);
//     return $result['total'];
// }

//     // Hàm 2: Lấy dữ liệu chiến dịch theo trang (Có giới hạn LIMIT và OFFSET)
//     function get_campaigns_paginated($limit, $offset) {
//         global $conn;
//         $sql = "SELECT c.*, o.org_name 
//                 FROM CharityCampaign c
//                 INNER JOIN CharityOrganization o ON c.org_id = o.org_id
//                 ORDER BY c.start_date DESC
//                 LIMIT :limit OFFSET :offset";
                
//         $stm = $conn->prepare($sql);
//         // Lưu ý: PDO yêu cầu ép kiểu INT cho LIMIT và OFFSET
//         $stm->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
//         $stm->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
//         $stm->execute();
//         return $stm->fetchAll(PDO::FETCH_ASSOC);
//     }
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


?>