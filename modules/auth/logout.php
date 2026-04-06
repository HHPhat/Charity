<?php
    //
    session_start();
    $_SESSION['logged_in'] = false;
    $_SESSION['account_id'] = null;//tên đăng nhập
    $_SESSION['role'] = null;//vai trò
    $_SESSION['fullname']=null;
    $_SESSION['donor_id']= null;// 
    header("Location: ../../");
?>