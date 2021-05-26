<?php

namespace app\controllers;

use app\core\Controller;

class About_meController extends Controller{
    public function indexAction(){
        $this->view->render('О мне');
    }
}