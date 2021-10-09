<?php

namespace app\models;

use app\core\BaseActiveRecord;

class Blog extends BaseActiveRecord
{
    protected static $tablename = "blog";
    public $Errors = [];
    public $id;
    public $msg_theme;
    public $msg;
    public $img;
    public $created_at;

    public function __construct()
    {
        parent::__construct();
        $this->validator->SetRule("msg-theme", "isNotEmpty");
        $this->validator->SetRule("msg", "isNotEmpty");
        $this->validator->Validate($_POST);
        $this->Errors = $this->validator->ShowErrors();
    }

    public static function getCSVData($filename)
    {
        $row = 1;
        $result = [];

        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    $result[] = mb_convert_encoding($data[$c], "UTF-8", "CP1251");
                }
            }
            fclose($handle);
        }

        array_shift($result);
        $result = static::msgToArray($result);

        return $result;
    }
    public static function msgToArray($msgs){
        $i = 0;
        foreach ($msgs as $msg){
            $msgs[$i++] = explode(";", $msg);
        }

        return array_reverse($msgs);
    }
}