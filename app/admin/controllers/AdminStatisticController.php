<?php

namespace app\admin\controllers;

use app\admin\controllers\AdminController;
use app\models\Statistic;

class AdminStatisticController extends AdminController
{
    public function indexAction()
    {
        AdminStatisticController::authenticate();
        $blogRecords = Statistic::all("date", "DESC");
        $vars["blogRecords"] = $blogRecords;
        $this->view->render('Статистика посещений', $vars);

    }
}