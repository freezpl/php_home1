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
      $modules['content'] = new Module($this->name, $this->data);
      $layoutData['name'] = $this->name;
      Layout::render(APP_LAYOUT, $modules, $layoutData);
      ob_get_flush();
    }
 }