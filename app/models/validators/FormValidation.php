<?php

namespace app\models\validators;


use DOMDocument;

class FormValidation
{
    private $Rules = [];
    private $Errors = [];

    public function isNotEmpty($data)
    {
        if (trim($data) === '') {
            return false;
        }
        return true;
    }

    public function checkFio($fio)
    {
        $fioArr = explode(" ", trim($fio));

        return count($fioArr) < 3 ? false : true;
    }

    public function isInteger($data)
    {
        if (gettype($data) === "integer") {
            return true;
        }
        return false;
    }

    public function isPhone($data)
    {
        return preg_match('/((8|\+7|\+3)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/', $data);
    }

    public function isLess($data, $value)
    {
        if ((gettype($data) === "string") and (intval($data) >= $value)) {
            return true;
        }
        return false;
    }


    public function isGreater($data, $value)
    {
        if ((gettype($data) === "string") and (intval($data) <= $value)) {
            return true;
        }
        return false;
    }

    public function isEmail($data)
    {
        if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    public function SetRule($field_name, $validator_name)
    {
        $this->Rules[$field_name] = [$validator_name];
    }

    public function Validate($post_array)
    {
        if (!empty($post_array)) {

            foreach ($this->Rules as $name => [$validator]) {
                switch ($validator) {
                    case "checkFio":
                        if (!$this->checkFio($post_array[$name])) $this->Errors[] = "Введите фамилию, имя и отчество!";
                        break;
                    case "isEmail":
                        if (!$this->isEmail($post_array[$name])) $this->Errors[] = "Неверно введён email!";
                        break;
                    case "isNotEmpty":
                        if (!$this->isNotEmpty($post_array[$name])) $this->Errors[] = "Заполните поле!";
                        break;
                    case "isPhone":
                        if (!$this->isPhone($post_array[$name])) $this->Errors[] = "Неверно введён номер телефона!";
                        break;
                }
            }

        }
        return $this->Errors;
    }


    public function ShowErrors()
    {
        $ErrorsData = [];
        foreach ($this->Errors as $Error) {
            $ErrorsData[] = '<div class="notification__item notification__item_red">' . $Error . '</div>';
        }
        return $ErrorsData;
    }

}