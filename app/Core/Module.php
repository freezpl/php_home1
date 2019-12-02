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
            include(APP_BASE.'/Views/'.$this->module.'.php');
        }
    }