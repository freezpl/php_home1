<?php

namespace App\Controllers;

use \App\Core\Controller;
use \App\Core\View;
use \App\Models\User;
use \App\Core\Services\UserService;
use \App\Core\Services\ValidatorService;
use \App\Core\Services\Captcha\CaptchaService;

    class LoginController extends Controller {

        public function index($id = null) : View {
            return new View('login');
        }

        public function log() : View {
            //isBloCked
            $res = CaptchaService::findIp($_SERVER['REMOTE_ADDR']);
            //$res = CaptchaService::findIp('1.1.1.1');
            if($res != null && $res['date'] != null){
                if($res['date'] > date("Y-m-d H:i:s"))
                {
                    $data['dateBlock'] = $res['date'];
                    return new View('block');
                }
                else
                CaptchaService::unblock($res['ip']); 
            }
            
            //post check
            if(!isset($_POST['email']) || !isset($_POST['password']))
                return new View('404');
            
            session_start();
            if(!isset($_SESSION['captcha']))
                return new View('session_error');

            $code = $_POST['code'];
            $isCaptcha = CaptchaService::checkCaptcha($code);

            if(!$isCaptcha){
                if(!CaptchaService::badAttempt($res))
                {
                    $data['errors']['captcha'] = 'Bad Captcha! Enter Again!';
                    return new View('login', $data);
                }
                else
                    return new View('block');
            }
            
            //email check
            $rules = array(array('method' => ValidatorService::REQUIRED),
                                array('method' => ValidatorService::MIN , 'data' => 4),
                                array('method' => ValidatorService::EMAIL));
            $validator = new ValidatorService('a', $rules);
            $emailErrs = $validator->validate();
            if(count($emailErrs) > 0) 
                $data['errors']['email'] = $emailErrs;

            $rules = array(array('method' => ValidatorService::REQUIRED),
                            array('method' => ValidatorService::MIN , 'data' => 3)
                                );
            $validator = new ValidatorService('a', $rules);
            $passErrs = $validator->validate();
            if(count($passErrs) > 0) 
            $data['errors']['password'] = $passErrs;

            $user = new User();
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
          

            $user = UserService::login($user);
            $data['user'] = $user;
            return ($user == null) ? new View('login', $data) : new View('profile', $data);
        }
    }
