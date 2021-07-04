<?php


namespace app\models\validators;


class ResultsVerification extends CustomFormValidation
{
    private $Error;

    public static function result_q_1($data)
    {
        if ($data === "ответ")
            return true;
        return $Error = "Неверный ответ! (вопрос №1)";
    }

    public static function result_q_2($data)
    {
        if ($data[0] === "true1")
            if (isset($data[1]) && ($data[1] === "true2")   )
            return true;
        return $Error = "Неверный ответ! (вопрос №2)";
    }

    public static function result_q_3($data)
    {
        if ($data === "true")
            return true;
        return $Error = "Неверный ответ! (вопрос №3)";
    }


}