<?php

namespace App\Core;

    class Layout {
        static function render($layout='default', $modules = array(), $data = array())
        {
            include(APP_LAYOUTS.$layout.'/index.php');
        }
    }