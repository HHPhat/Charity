<?php
    if (!defined('_HIENU')){
        die('Truy cập không hợp lệ');
    }


    function get_all_donors(){
        global $conn;
        $sql = "SELECT * FROM DONOR";
        $stm = $conn -> prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
?>