<?php 
    const _HIENU = true; //Hằng số để kiểm tra truy cập có hợp lệ không?

    const _MODULES = 'dashboard';
    const _ACTION = 'index';
    //Khai báo database
    const _HOST='localhost';
    const _DB='charity';
    const _USER='root';
    const _PASS = '';
    const _DRIVER = 'mysql';

    //debug error
    const _DEBUG = true;

    //Thiết lập HOST
    define('_HOST_URL', 'https://.'.$_SERVER['HTTP_HOST'].'/Charity');
    define('_HOST_URL_PAGES', _HOST_URL.'/Charity/pages');

    //Thiết lập PATH
    define('_PATH_URL',__DIR__);
    define('_PATH_URL_PAGES',__DIR__.'\pages');

?>