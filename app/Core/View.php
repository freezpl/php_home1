<?php

namespace App\Core;

    class View {
      private $name;
      private $data;

      function __construct($viewName, array $viewData = array()){
        $this->name = $viewName;
        $this->data = $viewData;
      }

    public function render()
    {
      ob_start();
      $modules['content'] = new Module($this->name, $this->data);
      $layoutData['name'] = $this->name;
      Layout::render(APP_LAYOUT, $modules, $layoutData);
      ob_get_flush();
    }
 }