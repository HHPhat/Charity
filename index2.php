<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    session_start();
    ob_start(); //header, cookie

    require_once 'config.php';
    
    $module = _MODULES;
    $action = _ACTION;

    if (!empty($GET['module'])){
        $module = $GET['module'];
    }

    if (!empty($GET['action'])){
        $action = $GET['action'];
    }

    $path = 'modules/'.$module.'/'.$action.'.php';
    echo $path;
?>