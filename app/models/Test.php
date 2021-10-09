<?php

namespace app\models;

use app\core\BaseActiveRecord;

class Test extends BaseActiveRecord
{
    protected static $tablename = "test";
    public $Errors = [];
    public $id;
    public $group;
    public $created_at;
    public $fio;
    public $q_1;
    public $q_2;
    public $q_3;
    public function __construct()
    {
        parent::__construct();
        $this->validator->SetRule("inputFIO", "checkFio");
        $this->validator->SetRule("group", "isNotEmpty");
        $this->validator->Validate($_POST);
        $this->Errors = $this->validator->ShowErrors();
    }
}