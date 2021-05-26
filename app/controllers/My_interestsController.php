<?php

namespace app\controllers;

use app\core\Controller;

class My_interestsController extends Controller{
    public function indexAction(){
        $this->view->render('Мои интересы');
    }
}