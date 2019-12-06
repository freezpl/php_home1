<?php 
namespace App\Core\Services\Captcha;

use \App\Core\Services\DbService;
use PDO;

class CaptchaService{

    private static function generateCode() 
	{    
		  $chars = 'abdefghijklmnopqrstyvwxyz123456789';
		  $length = rand(4, 7);
		  $numChars = strlen($chars);
		  $str = '';
		  for ($i = 0; $i < $length; $i++) {
			$str .= substr($chars, rand(1, $numChars) - 1, 1);
		  }

			$array_mix = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
			srand ((float)microtime()*1000000);
            shuffle ($array_mix);
            
		return implode("", $array_mix);
	}

	public static function createCaptcha(){
		$code = self::generateCode();
		session_start();
		$_SESSION['captcha']=md5($code);
		//session_destroy();
		self::renderCaptcha($code);
	}

	public static function checkCaptcha($code){
		$code = trim($code); 
		$code = md5($code);

		//session_start();
		$cap = $_SESSION['captcha'];
		session_destroy();
		
		return ($code == $cap) ? true : false;
	}

	public static function badAttempt($row){
		if($row == null)
			self::addToBlocklist($_SERVER['REMOTE_ADDR']);
		else{
			if((int)$row['attempts'] > 0)
				self::decrementAttempt($row['ip']);
			else{
				self::blockIp($row['ip']);
				return true;
			}
		}
		return false;
	}

	public static function findIp($ip){
		$dbh = DbService::setCotnnection();
        $query = "SELECT * FROM blocklist WHERE ip='".$ip."'";
        try {
            $sth = $dbh->prepare($query);
            $sth->execute();
			$res = $sth->fetch(PDO::FETCH_ORI_FIRST);
			return ($res) ? $res : null;
        }catch (Exception $e){
			var_dump($e);
			return null;
		}
		finally{
			$dbh = null;
		}
	}

	private static function addToBlocklist($ip){
		$dbh = DbService::setCotnnection();
        $query = "INSERT INTO blocklist (ip) VALUES (?)";
        try {
            $sth = $dbh->prepare($query);
            $sth->execute([$ip]);
        }catch (Exception $e){
			var_dump($e);
		}
		finally{
			$dbh = null;
		}
	}

	private static function decrementAttempt($ip){
		$dbh = DbService::setCotnnection();
        $query = "UPDATE blocklist SET attempts = attempts - 1 WHERE ip='".$ip."'";
        try {
            $sth = $dbh->prepare($query);
            $sth->execute();
        }catch (Exception $e){
			var_dump($e);
		}
		finally{
			$dbh = null;
		}
	}

	private static function blockIp($ip){
		$dbh = DbService::setCotnnection();
		$date_time = date('Y-m-d H:i:s', strtotime('now +1 hour'));
        $query = "UPDATE blocklist SET date = '".$date_time."' WHERE ip='".$ip."'";
        try {
            $sth = $dbh->prepare($query);
            $sth->execute();
        }catch (Exception $e){
			var_dump($e);
		}
		finally{
			$dbh = null;
		}
	}

	static function unblock($ip){
		$dbh = DbService::setCotnnection();
        $query = "DELETE FROM `blocklist` WHERE `ip`='".$ip."'";
        try {
            $sth = $dbh->prepare($query);
            $sth->execute();
        }catch (Exception $e){
			var_dump($e);
		}
		finally{
			$dbh = null;
		}
	}

	private static function renderCaptcha($code)
	{
		$darkCaptcha = array('bg_from' => 0, 'bg_to' => 120, 'txt_from' => 100, 'txt_to' => 255, 'ln_from' => 0, 'ln_to' => 150);
		$lightCaptcha = array('bg_from' => 150, 'bg_to' => 255, 'txt_from' => 0, 'txt_to' => 120, 'ln_from' => 150, 'ln_to' => 255);

		$col = (rand(0,1) == 0) ? $darkCaptcha : $lightCaptcha;

		header("Content-Type:image/png");
		$linenum = rand(3, 7); 

		$img_arr = array("1.png");
		$font_arr = array();
            $font_arr[0]["fname"] = "16872.ttf";
            $font_arr[1]["fname"] = "17417.ttf";
            
		//$n = rand(0,sizeof($font_arr)-1);
		$img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
		//$im = imagecreatefrompng (img_dir . $img_fn); 
		//$im = imagecreate(230, 50);

		$rgbs = array([rand($col['bg_from'], $col['bg_to']), rand($col['bg_from'], $col['bg_to']), rand($col['bg_from'], $col['bg_to'])], 
						[rand($col['bg_from'], $col['bg_to']),rand($col['bg_from'], $col['bg_to']),rand($col['bg_from'], $col['bg_to'])], 
						[rand($col['bg_from'], $col['bg_to']),rand($col['bg_from'], $col['bg_to']),rand($col['bg_from'], $col['bg_to'])], 
						[rand($col['bg_from'], $col['bg_to']),rand($col['bg_from'], $col['bg_to']),rand($col['bg_from'], $col['bg_to'])]
					);

		$im = self::gradient(230,50, $rgbs, false);
		
		$x = rand(0, 15);
		$fontPath = __DIR__."/assets/fonts/";
		for($i = 0; $i < strlen($code); $i++) {
			//$x+=25;
			$x+=rand(18, 28);
			$letter=substr($code, $i, 1);
			$backgr = imagecolorallocate($im, rand($col['txt_from'], $col['txt_to']), rand($col['txt_from'], $col['txt_to']), rand($col['txt_from'], $col['txt_to']));
			imagettftext ($im, rand(20, 32), rand(-25, 25), $x, rand(32, 38), $backgr, $fontPath.$font_arr[rand(0,sizeof($font_arr)-1)]["fname"], $letter);
		}

		for($i=0; $i<$linenum; $i++){
            $color = imagecolorallocate($im, rand($col['ln_from'], $col['ln_to']), rand($col['ln_from'], $col['ln_to']), rand($col['ln_from'], $col['ln_to']));     
			   imageline($im, 0, rand(1, 50), 230, rand(1, 50), $color);
		}
		ImagePNG ($im);
		ImageDestroy ($im);
	}

	private static function gradient($w=100, $h=100, $c=array('#FFFFFF','#FF0000','#00FF00','#0000FF'), $hex=true) {
		$im=imagecreatetruecolor($w,$h);
		if($hex) {  // convert hex-values to rgb
		  for($i=0;$i<=3;$i++) {
		   $c[$i]=self::hex2rgb($c[$i]);
		  }
		}
		
		$rgb=$c[0]; // start with top left color
		for($x=0;$x<=$w;$x++) { // loop columns
		  for($y=0;$y<=$h;$y++) { // loop rows
		   // set pixel color
		   $col=imagecolorallocate($im,$rgb[0],$rgb[1],$rgb[2]);
		   imagesetpixel($im,$x-1,$y-1,$col);
		   // calculate new color 
		   for($i=0;$i<=2;$i++) {
			$rgb[$i]=
			  $c[0][$i]*(($w-$x)*($h-$y)/($w*$h)) +
			  $c[1][$i]*($x     *($h-$y)/($w*$h)) +
			  $c[2][$i]*(($w-$x)*$y     /($w*$h)) +
			  $c[3][$i]*($x     *$y     /($w*$h));
		   }
		  }
		}
		return $im;
		}
		

	private static function hex2rgb($hex)
	{
		$rgb[0]=hexdec(substr($hex,1,2));
		$rgb[1]=hexdec(substr($hex,3,2));
		$rgb[2]=hexdec(substr($hex,5,2));
		return($rgb);
	}


}