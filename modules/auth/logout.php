<?php
    //
    session_start();
    $_SESSION['logged_in'] = false;
    $_SESSION['account_id'] = null;
    $_SESSION['role'] = null;
    $_SESSION['fullname']=null;
    $_SESSION['donor_id']= null;
    header("Location: ../../");
?>