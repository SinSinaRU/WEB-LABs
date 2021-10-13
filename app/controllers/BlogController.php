<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Blog;
use app\models\Comments;

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
        $Errors = [];
        if (!empty($_FILES)) {

            $file = $_SERVER['DOCUMENT_ROOT'] . "/public/" . $_FILES["csv-file"]["name"];

            if (file_exists($file)) {
                $msgs = Blog::getCSVData($file);
                $this->saveCSV($msgs);
            } else $Errors[] = "Файл не существует";
        }
        $vars = [];
        $this->view->render('Загрузка данных блога:', $vars);
    }

    public function addCommentAction()
    {
        header('Content-Type: text/xml');

        $post = file_get_contents('php://input');

        $postData = simplexml_load_string($post);
        foreach ((array)$postData as $index => $node)
            $_POST[$index] = $node;

        if (!empty($_POST["comment"])) {
            $comments = new Comments();
            $comments->id_blog = (int)$_SESSION["blog-page"];
            $comments->created_at = date('y-m-d H:i:s');
            $comments->text = $_POST["comment"];
            $comments->user_fio = $_SESSION["user-fio"];
            $comments->save();
        }
        $all_comments = Comments::findAll((int)$_SESSION["blog-page"], "id_blog");
        $xmlstr = '<note></note>';
        $xmlData = new \ SimpleXMLElement($xmlstr);
        $i = 0;

        foreach ($all_comments as $value) {
            $i++;
            $data_comment = $xmlData->addChild('comment');
            $data_comment->addChild('user_fio', $value->user_fio);
            $data_comment->addChild('text', $value->text);
            $data_comment->addChild('created_at', $value->created_at);
        }
        $_REQUEST["xml"]=$xmlData->asXML();
        echo $_REQUEST["xml"];

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

    function saveCSV($msgs)
    {
        foreach ($msgs as $msg) {
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