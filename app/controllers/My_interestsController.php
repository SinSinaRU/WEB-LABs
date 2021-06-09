<?php

namespace app\controllers;

use app\core\Controller;

class My_interestsController extends Controller{
    public function indexAction(){
        $vars=[
            'hrefs' => $this->model->getInterestsHref(),
            'interests'=> $this->model->getInterestsText()];
        $this->view->render('Мои интересы',$vars);
    }
}