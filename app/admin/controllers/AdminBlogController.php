<?php

namespace app\admin\controllers;

use app\admin\controllers\AdminController;
use app\models\Blog;

class AdminBlogController extends AdminController
{
    public function editAction()
    {
        AdminBlogController::authenticate();
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/public/uploads/img/";
        $blogRecords = Blog::all("created_at", "DESC");
        $vars = [];
        if (!empty($_POST)) {
            $vars["Errors"] = $this->model->Errors;
            if (count($vars["Errors"]) == 0) {
                $this->save();
                $uploadfile = $uploaddir . basename($_FILES['img']['name']);
                if (!file_exists($uploadfile))
                    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
            }
        }
        $vars["blogRecords"] = $blogRecords;
        $this->view->render('Редактирование блога:', $vars);
    }
    function save()
    {
        $test = new Blog();
        $test->created_at = date('y-m-d H:i:s');
        $test->msg_theme = $_POST["msg-theme"];
        $test->img = $_FILES["img"]["name"];
        $test->msg = $_POST["msg"];
        $test->save();
    }
}