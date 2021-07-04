<?php


namespace app\models\validators;


class CustomFormValidation extends FormValidation
{

    public static function check_q_1($data)
    {
        if (!empty($data))
            return ResultsVerification::result_q_1($data);
        return false;
    }

    public static function check_q_2($data)
    {
        if (!empty($data))
            return ResultsVerification::result_q_2($data);
        return false;
    }
    public static function check_q_3($data)
    {
        if (!empty($data))
            return ResultsVerification::result_q_3($data);
        return false;
    }


}