<?php

namespace App\Core;

    class View {

      private $path;
      private $name;
      private $data;


      function __construct($viewName, array $viewData = array()){
        $this->name = $viewName;
        $this->data = $viewData;
        $this->path = dirname(__FILE__, 2).'/Views/';
      }

    public function render()
    {
      ob_start();
      if(count($this->data) > 0)
        extract($this->data);

      require(dirname(__FILE__, 3).'/pages/layouts/simple/header.php');
      require($this->path.$this->name.'.php');  
      require(dirname(__FILE__, 3).'/pages/layouts/simple/footer.php');
      ob_get_flush();

    }
 }