<?php

namespace app\models;

use app\core\BaseActiveRecord;

class Statistic extends BaseActiveRecord
{
    protected static $tablename = 'statistics';

    public $id;
    public $date;
    public $ip_address;
    public $host_name;
    public $browser_name;
    public $web_page;

    public static function save_statistic()
    {
        $stat = new Statistic();
        $stat->date = date('Y-m-d H:i:s');
        $stat->host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $stat->ip_address = $_SERVER['REMOTE_ADDR'];
        $stat->browser_name = $_SERVER['HTTP_USER_AGENT'];
        $stat->web_page = $_SERVER['REQUEST_URI'];
        if ($stat->web_page != "/blog/addComment")
            if ($stat->web_page != "/users/loginCheck") {
                $stat->save();
            }
    }
}
