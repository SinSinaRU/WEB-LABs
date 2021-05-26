<?php

namespace app\controllers;

use app\core\Controller;

class FeedbackController extends Controller{
    public function indexAction(){
        $this->view->render('Обратная связь');
    }
}