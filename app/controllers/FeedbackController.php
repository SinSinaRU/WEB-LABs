<?php

namespace app\controllers;

use app\core\Controller;

class FeedbackController extends Controller{
    public function indexAction(){
        $vars=[];
        if( !empty( $_POST ) ){
            $vars["Errors"] = $this->model->Errors;
        }
        $this->view->render('Обратная связь',$vars);
    }
}