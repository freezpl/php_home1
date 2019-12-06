<?php 
namespace App\Core\Services;

class ValidatorService{

    const REQUIRED = 'required'; 
    const MIN = 'min';
    const EMAIL = 'email';

    private $rules;
    private $value;
    private $errors;
    
    public function __construct($checkValue, array $rulesArr = array()){
        $this->value = $checkValue;
        $this->rules = $rulesArr;
        $this->errors = array();
    }

    function validate(){
        foreach ($this->rules as $r) {
            $params = (isset($r['data'])) ? $r['data'] : array();
            $method = $r['method'];
            if (method_exists($this, $method))
                call_user_func(array($this, $method), $params);
            $this->required();
        }
        return $this->errors;
    }

    private function required(){
        $this->value = trim($this->value);
        if(strlen($this->value) == 0)
            array_push($this->errors, 'Empty field');
    }

    private function min($min){
        if(strlen($this->value) < $min){
            array_push($this->errors, 'Field length must be more than '.$min);
        }
    }

    private function email(){
    if(!filter_var($this->value, FILTER_VALIDATE_EMAIL)){
            array_push($this->errors, 'Wrong email');
        }
    }
}