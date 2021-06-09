<?php

namespace app\models;

use app\core\Model;

class Feedback extends Model
{

    public $Errors = [];

    public function __construct()
    {
        parent::__construct();
        $this->validator->SetRule("inputFIO", "checkFio");
        $this->validator->SetRule("mail", "isEmail");
        $this->validator->SetRule("birthday", "isNotEmpty");
        $this->validator->SetRule("comment", "isNotEmpty");
        $this->validator->SetRule("phone", "isPhone");
        $this->validator->Validate($_POST);
        $this->Errors=$this->validator->ShowErrors();
    }
}