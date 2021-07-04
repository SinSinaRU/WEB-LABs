<?php

namespace app\controllers;

use app\core\Controller;

class TestController extends Controller
{
    public function indexAction()
    {
        $vars = [];
        if (!empty($_POST)) {
            $vars["Errors"] = $this->model->Errors;
        }
        $this->view->render('Тест', $vars);
    }
}