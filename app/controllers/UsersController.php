<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\models\Users;

class UsersController extends Controller
{
    public function loginAction()
    {
        $vars = [];
        if (!empty($_POST)) {
            $user_data = Users::find("'" . $_POST["login"] . "'", "login");
            if ($user_data != null) {
                if ($user_data->password == md5(md5("salt") . $_POST["password"])) {
                    $_SESSION["user"] = $_POST["login"];
                    $_SESSION["user-fio"] = $user_data->fio;
                } else
                    $this->model->Erorrs[] = "Невереный пароль";
            } else
                $this->model->Erorrs[] = "Пользователь с таким логином не найден";
        }
        $this->view->render('Вход в систему', $vars);
    }

    public function registerAction()
    {
        $vars = [];

        if (!empty($_POST)) {
            if (Users::find("'" . $_POST["login"] . "'", "login") != null)
                $this->model->Errors[] = "Пользователь с таким логином сущевстует";
            $vars["Errors"] = $this->model->Errors;
            if (count($vars["Errors"]) == 0) {
                $this->save();
            }
        }
        $this->view->render('Регистрация пользователя', $vars);
    }

    public function logoutAction()
    {
        $_SESSION['user'] = "";
        $_SESSION["user-fio"] = "";
        View::redirect("/");
    }

    function save()
    {
        $user = new Users();
        $user->fio = $_POST["inputFIO"];
        $user->login = $_POST["login"];
        $user->password = md5(md5("salt") . $_POST["password"]);
        $user->email = $_POST["email"];
        $user->save();
    }
}