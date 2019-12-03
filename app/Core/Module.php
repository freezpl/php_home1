<?php

namespace App\Core;

    class Module {

        private $module;
        private $data;

        function __construct($moduleName='', array $dataArr = array()){
            $this->module = $moduleName;
            $this->data = $dataArr;
        }

        function render()
        {
            include(APP_PAGES.$this->module.'.php');
        }

        static function quiqRender($module, array $data = array()){
            extract($data);
            include(APP_MODULES.$module.'.php');
        }
    }