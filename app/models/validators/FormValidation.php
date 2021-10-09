<?php

namespace app\models\validators;



class FormValidation
{
    protected $Rules = [];
    public $Errors = [];

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
                    case "check_q_1":
                        if (!CustomFormValidation::check_q_1($post_array[$name])) $this->Errors[] = "Заполните поле для ответа на 1 вопрос";
                        else if(CustomFormValidation::check_q_1($post_array[$name])!==true) $this->Errors[]=CustomFormValidation::check_q_1($post_array[$name]);
                        break;
                    case "check_q_2":
                        if (!CustomFormValidation::check_q_2($post_array[$name])) $this->Errors[] = "Заполните поле для ответа на 2 вопрос";
                        else if(CustomFormValidation::check_q_2($post_array[$name])!==true) $this->Errors[]=CustomFormValidation::check_q_2($post_array[$name]);
                        break;
                    case "check_q_3":
                        if (!CustomFormValidation::check_q_3($post_array[$name])) $this->Errors[] = "Заполните  поле для ответа на 3 вопрос";
                        else if(CustomFormValidation::check_q_3($post_array[$name])!==true) $this->Errors[]=CustomFormValidation::check_q_3($post_array[$name]);
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
            $ErrorsData[] = '<div class="notification__item">' . $Error . '</div>';
        }
        return $ErrorsData;
    }

}