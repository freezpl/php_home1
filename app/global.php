<?php
    //GLOBAL SETTINGS
    //set port if your port not 80
    define('APP_PORT', '');
    //set damain with 2 backslashes WITHOUT any protocol! (example.com)
    define('APP_HOST', 'home1');

    //set layout - app/Views/layouts/(example)
    define('APP_LAYOUT', 'default');

    if(APP_PORT != '')
        define('APP_URL', '//'.APP_HOST.':'.APP_PORT.'/');
    else
        define('APP_URL', '//'.APP_HOST.'/');
    define('APP_BASE', __DIR__);


    define('APP_PAGES', APP_BASE.'/Views/pages/');
    define('APP_MODULES', APP_BASE.'/Views/modules/');
    define('APP_LAYOUTS', APP_BASE.'/Views/layouts/');
    define('APP_SERVICES', APP_BASE.'/Services/');
?>