<?php

namespace app\controllers;

use app\core\Controller;

class Photo_albumController extends Controller
{
    public function indexAction()
    {
        $vars=$this->model->getImg();
        $this->view->render('Фотоальбом',$vars);


    }
}