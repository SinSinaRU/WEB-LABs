<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Blog;

class BlogController extends Controller
{
    public function indexAction()
    {
        $blogRecords = Blog::all("created_at", "DESC");
        $vars = [];
        $pages = [];
        $i = 1;
        foreach ($blogRecords as $blogRecord) {
            $pages[$i++] = $blogRecord->id;
        }
        $last_page = $i - 1;
        $vars["pages"] = $pages;
        $vars["last_page"] = $last_page;
        $this->view->render('Мой блог:', $vars);
    }

    public function loadAction()
    {
        $Errors=[];
        if (!empty($_FILES)) {

            $file =  $_SERVER['DOCUMENT_ROOT'] . "/public/" . $_FILES["csv-file"]["name"];

            if (file_exists($file)) {
                $msgs = Blog::getCSVData($file);
                $this->saveCSV($msgs);
            } else $Errors[] = "Файл не существует";
        }
        $vars = [];
        $this->view->render('Загрузка данных блога:', $vars);
    }

    public function editAction()
    {
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
    function saveCSV($msgs){
        foreach ($msgs as $msg){
            $blog = new Blog();

            $blog->msg_theme = $msg[0];
            $blog->msg = $msg[1];
            $blog->img = $msg[2];
            $blog->created_at = $msg[3];

            $blog->save();
        }
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