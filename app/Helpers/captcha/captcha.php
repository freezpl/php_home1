<?php
define ( 'DOCUMENT_ROOT', dirname ( __FILE__ ) );
define("img_dir", DOCUMENT_ROOT."/captcha/img/");

include("random.php");
$captcha = generate_code();

session_start();
$_SESSION['captcha']=$captcha;
session_destroy();

img_code($captcha);	

function img_code($code)
{
		//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");                   
		//header("Last-Modified: " . gmdate("D, d M Y H:i:s", 10000) . " GMT");
		//header("Cache-Control: no-store, no-cache, must-revalidate");         
		//header("Cache-Control: post-check=0, pre-check=0", false);           
		//header("Pragma: no-cache");                                           
		header("Content-Type:image/png");

		$linenum = rand(3, 7); 

		$img_arr = array("1.png");
		$font_arr = array();
            $font_arr[0]["fname"] = "DroidSans.ttf";	
            
            $font_arr[0]["size"] = rand(20, 30);
            
		$n = rand(0,sizeof($font_arr)-1);
		$img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
		//$im = imagecreatefrompng (img_dir . $img_fn); 
        $im = imagecreate(150, 40);

		// for ($i=0; $i<$linenum; $i++)
		// {
        //     $color = imagecolorallocate($im, rand(0, 150), rand(0, 100), rand(0, 150)); 
            
		// 	imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
		// }
        $color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200));
			
		// $x = rand(0, 35);
		// for($i = 0; $i < strlen($code); $i++) {
		// 	$x+=15;
		// 	$letter=substr($code, $i, 1);
		// 	imagettftext ($im, $font_arr[$n]["size"], rand(2, 4), $x, rand(50, 55), $color, img_dir.$font_arr[$n]["fname"], $letter);
		// }

		// for ($i=0; $i<$linenum; $i++)
		// {
		// 	$color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
		// 	imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
		// }

		ImagePNG ($im);
		ImageDestroy ($im);
}

?>