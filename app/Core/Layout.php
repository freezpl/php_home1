<?php

namespace App\Core;

    class Layout {
        static function render($layout='default', $modules = array(), $data = array())
        {
            include(APP_BASE.'/Views/layouts/'.$layout.'/index.php');
        }
    }