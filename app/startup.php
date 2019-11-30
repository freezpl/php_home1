<?php

use App\Core\Application;

require_once dirname(__FILE__,2) . '/vendor/autoload.php';
require_once dirname(__FILE__) . '/global.php';
require_once dirname(__FILE__) . '/routes.php';

$app = new Application();
$app->execute();