<?php

namespace app\core;

use app\models\Statistic;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'app/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params)
    {
        $route = '#^' . $route . '(\?.*)?$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }


    public function run()
    {
        if ($_REQUEST['admin_area']) {
            $admin_path = '\admin';
            $admin_class_prefix = 'Admin';
        } else {
            $admin_path = '';
            $admin_class_prefix = '';
            Statistic::save_statistic();
        }
        if ($this->match()) {
            $_REQUEST['action'] = $this->params['action'];
            $path = 'app' . $admin_path . '\controllers\\' . $admin_class_prefix . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $_REQUEST['action'] . 'Action';

                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

}