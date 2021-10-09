<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Test;

class TestController extends Controller
{
    public function indexAction()
    {
        $vars = [];
        if (!empty($_POST)) {
            $vars["Errors"] = $this->model->Errors;
            if (count($vars["Errors"]) == 0) {
                $this->save();
            }
        }
        $this->view->render('Тест', $vars);
    }

    function save()
    {
        $test = new Test();
        $test->fio = $_POST["inputFIO"];
        $test->created_at = date('y-m-d');
        $test->group = $_POST["group"];
        $test->q_1 = $_POST["quest1"] == "ответ";
        $test->q_2 = $_POST["quest2"][0] == "true1"&& $_POST["quest2"][1]="true2";
        $test->q_3 = $_POST["quest3"] == "true";
        $test->save();
    }
}