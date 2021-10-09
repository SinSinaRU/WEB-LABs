<?php

namespace app\controllers;

use app\core\Controller;

class Guest_bookController extends Controller
{
    public function indexAction()
    {
        $Errors = [];
        if (!empty($_POST)) {
            $Errors = $this->model->Errors;
            if (count($Errors) == 0)
                $this->model->saveMsg('public/messages.inc');
        }
        $msgs = $this->model->getMsg('public/messages.inc');
        $vars = [
            "msgs" => $msgs,
            "Errors" => $Errors,
        ];
        $this->view->render('Гостевая книга', $vars);


    }

    public function loadAction()
    {
        $msgs = '';
        $Errors = [];
        if (!empty($_FILES)) {
            $file = "public/" . $_FILES["file"]["name"];
            if (file_exists($file) && !is_dir($file))
                $msgs = $this->model->getMsg($file);
            else $Errors[] = "Файл не существует";
        }
        $vars = [
            "msgs" => $msgs,
            "Errors" => $Errors,
        ];
        $this->view->render('Гостевая книга', $vars);

    }
}