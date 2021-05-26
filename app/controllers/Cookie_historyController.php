<?php

namespace app\controllers;

use app\core\Controller;

class Cookie_historyController extends Controller{
    public function indexAction(){
        $this->view->render('История cookie');
    }
}