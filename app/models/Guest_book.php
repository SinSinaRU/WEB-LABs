<?php


namespace app\models;

use app\core\Model;

class Guest_book extends Model
{
    public $Errors = [];

    public function __construct()
    {
        parent::__construct();
        if ($_SERVER["REQUEST_URI"] == "/guest-book") {
            $this->validator->SetRule("fio", "checkFio");
            $this->validator->SetRule("email", "isEmail");
            $this->validator->SetRule("text", "isEmpty");
        }
        $this->validator->Validate($_POST);
        $this->Errors = $this->validator->ShowErrors();
    }

    public function getMsg($filename)
    {
        $msgs = file_get_contents($filename);
        $msgs = explode("\n", $msgs);
        $i = 0;
        foreach ($msgs as $msg) {
            $msgs[$i++] = explode(";", $msg);
        }
        return array_reverse($msgs);
    }

    public function saveMsg($filename)
    {
        $data = [];
        foreach ($_POST as $key => $value) {
            $data[$key] = htmlspecialchars($value);
        }
        $msgData = $data["fio"] . ";" . $data['email'] . ";" . $data["text"] . ";" . date("d.m.y.") . "\n";
        file_put_contents($filename, $msgData, FILE_APPEND);
    }

}