<?php

namespace app\models;

use app\core\BaseActiveRecord;

class Users extends BaseActiveRecord
{
    protected static $tablename = 'users';

    public $id;
    public $fio;
    public $login;
    public $password;
    public $email;

    public function __construct()
    {
        parent::__construct();
        $url = $_SERVER["REQUEST_URI"];
        if ($url == "/users/register") {
            $this->validator->SetRule("inputFIO", "checkFio");
            $this->validator->SetRule("password", "isNotEmpty");
            $this->validator->SetRule("login", "isNotEmpty");
            $this->validator->SetRule("inputFIO", "isNotEmpty");
        } else if($url == "/users"){
            $this->validator->SetRule("password", "isNotEmpty");
            $this->validator->SetRule("login", "isNotEmpty");
        }
        $this->validator->Validate($_POST);
        $this->Errors = $this->validator->ShowErrors();
    }

}
