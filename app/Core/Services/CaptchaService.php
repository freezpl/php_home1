<?php 
namespace App\Core\Services;

class CaptchaService{

    static function generateCode() 
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


 
}