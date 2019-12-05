<?php
require_once dirname(__FILE__,4) . '/vendor/autoload.php';
require_once dirname(__FILE__,3) . '/global.php';

use \App\Core\Services\Captcha\CaptchaService;
CaptchaService::createCaptcha();


// include("random.php");
// $captcha = generate_code();

// session_start();
// $_SESSION['captcha']=$captcha;
// session_destroy();

// img_code($captcha);	

// function img_code($code)
// {                                       
// 		header("Content-Type:image/png");
// 		$linenum = rand(3, 7); 

// 		$img_arr = array("1.png");
// 		$font_arr = array();
//             $font_arr[0]["fname"] = "16872.ttf";	
//             $font_arr[0]["size"] = rand(20, 30);
            
// 		$n = rand(0,sizeof($font_arr)-1);
// 		$img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
// 		//$im = imagecreatefrompng (img_dir . $img_fn); 
//         $im = imagecreate(150, 40);

// 		//LINES
// 		// for ($i=0; $i<$linenum; $i++)
// 		// {
//         //     $color = imagecolorallocate($im, rand(0, 150), rand(0, 100), rand(0, 150));        
// 		// 	   imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
// 		// }

// 		//IMG COLOR
//         $color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200));
	
// 		$x = rand(0, 35);
	
// 		for($i = 0; $i < strlen($code); $i++) {
// 			$x+=15;
// 			$letter=substr($code, $i, 1);
// 			$ddd = APP_CAPTCHA."fonts/".$font_arr[$n]["fname"];
			
// 			imagettftext ($im, $font_arr[$n]["size"], rand(2, 4), $x, rand(50, 55), $color, APP_CAPTCHA."fonts/".$font_arr[$n]["fname"], $letter);
// 		}

// 		// for ($i=0; $i<$linenum; $i++)
// 		// {
// 		// 	$color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
// 		// 	imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
// 		// }

// 		ImagePNG ($im);
// 		ImageDestroy ($im);
// }

?>