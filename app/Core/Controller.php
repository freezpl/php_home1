<?php

namespace App\Core;

    abstract class Controller {

        abstract public function index($id = null) : View;
    }