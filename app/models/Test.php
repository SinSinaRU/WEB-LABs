<?php

namespace app\models;

use app\core\Model;

class Test extends Model
{

    public $Errors = [];

    public function __construct()
    {
        parent::__construct();
        $this->validator->SetRule("inputFIO", "checkFio");
        $this->validator->SetRule("group", "isNotEmpty");
        $this->validator->SetRule("quest1", "check_q_1");
        $this->validator->SetRule("quest2", "check_q_2");
        $this->validator->SetRule("quest3", "check_q_3");
        $this->validator->Validate($_POST);
        $this->Errors = $this->validator->ShowErrors();
    }
}