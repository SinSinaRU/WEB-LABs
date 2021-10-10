<?php

namespace app\admin\controllers;

use app\admin\controllers\AdminController;

class AdminGuest_bookController extends AdminController
{
    public function loadAction()
    {
        AdminMainController::authenticate();
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