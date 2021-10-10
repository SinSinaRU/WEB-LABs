<?php   

namespace app\core;



class View
{
    public $path;
    public $route;
    public $template = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars = [])
    {
        if ($_REQUEST['admin_area']) {
            $admin_path = '/admin';
        } else {
            $admin_path = '';
        }

        extract($vars);
        if (file_exists('app'.$admin_path.'/views/' . $this->path . '.php')) {
            ob_start();
            require 'app'.$admin_path.'/views/' . $this->path . '.php';
            $content = ob_get_clean();
            require 'app'.$admin_path.'/views/templates/' . $this->template . '.php';
        } else {
            echo 'view not found: ' . $this->path;
        }
    }

    public static function errorCode($code)
    {
        $path = 'app/views/errors/' . $code . '.php';
        http_response_code($code);
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function redirect($url)
    {
        header('location: ' . $url);
        exit;
    }
}