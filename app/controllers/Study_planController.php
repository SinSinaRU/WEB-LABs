<?php

namespace app\controllers;

use app\core\Controller;

class Study_planController extends Controller{
    public function indexAction(){
        $this->view->render('Учебный план');
    }
}