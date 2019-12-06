<?php
require_once dirname(__FILE__,4) . '/vendor/autoload.php';
require_once dirname(__FILE__,3) . '/global.php';

use \App\Core\Services\Captcha\CaptchaService;
CaptchaService::createCaptcha();
?>