<?php

namespace app\models;

use app\core\BaseActiveRecord;

class Comments extends BaseActiveRecord
{
    protected static $tablename = "comments";
    public $id;
    public $text;
    public $id_blog;
    public $user_fio;
    public $created_at;
}