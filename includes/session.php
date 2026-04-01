<?php
    if (!defined('_HIENU')){
        die('Truy cập không hợp lệ');
    }

    function Set_session($key, $value){
        if (!empty(session_id())){
            $_SESSION[$key]=$value;
            return true;
        }
        return false;
    }

    function Get_session($key){
        if (!empty(session_id())){
            return $_SESSION;
        }else{
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }
        }
        return false;
    }

    function Remove_session($key){
        if(empty($key)){
            session_destroy();
            return true;
        }else{
            if(isset($_SESSION[$key])){
                unset($_SESSION[$key]);
            }
            return true;
        }
        return false;
    }

    function Set_session_flash($key,$value){
        $key = $key.'FLASH';
        $rel = Get_session($key);
        Remove_session($key);
        return rel;
    }
?>