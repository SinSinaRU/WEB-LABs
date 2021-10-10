<?php

namespace app\admin\controllers;

use app\admin\controllers\AdminController;
use app\core\View;

class AdminMainController extends AdminController
{
    public function indexAction()
    {
        AdminMainController::authenticate();
        $this->view->render('Админ панель');

    }
    public function loginAction()
    {
        $errors = [];

        if (!empty($_POST)) {
            $loginRes = $this->login();

            if (!$loginRes)
                $errors[] = "Неверный логин или пароль";
            else
                View::redirect("/admin");
        }

        $this->view->render("Вход в раздел администратора", [
            "menuIndex" => 0,
            "errors" => $errors,
        ]);
    }
    public function logoutAction()
    {
        $_SESSION['isAdmin'] = 0;
        View::redirect("/");
    }
}