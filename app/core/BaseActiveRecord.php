<?php

namespace app\core;

use PDO, PDOException;

class BaseActiveRecord extends Model
{
    public static $pdo;
    protected static $tablename;
    protected static $dbfields = [];

    public function __construct()
    {
        parent::__construct();

        if (!static::$tablename) {
            return;
        }

        static::setupConnection();
        static::getFields();
        $this->fillFields();
    }

    public static function getFields()
    {
        $stmt = static::$pdo->query("SHOW FIELDS FROM " . static::$tablename);
        while ($row = $stmt->fetch()) {
            static::$dbfields[$row['Field']] = $row['Type'];
        }
    }

    public function fillFields()
    {
        foreach (static::$dbfields as $field => $type) {
            $this->$field;
        }
    }

    public static function setupConnection()
    {
        if (!isset(static::$pdo)) {
            try {
                static::$pdo = new PDO("mysql:dbname=web-lr; host=localhost; charset=utf8", "root", "");
            } catch (PDOException $ex) {
                die("Ошибка подключения к БД: $ex");
            }
        }
    }

    public static function find($id)
    {
        $sql = "SELECT * FROM " . static::$tablename . " WHERE id=$id";
        $stmt = static::$pdo->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        $ar_obj = new static();

        foreach ($row as $key => $value) {
            $ar_obj->$key = $value;
        }

        return $ar_obj;
    }

    public static function all($orderBy = "id", $orderDirection = "ASC")
    {
        $sql = "SELECT * FROM " . static::$tablename . " ORDER BY $orderBy $orderDirection";
        return static::get($sql);

    }

    private static function get($sql)
    {
        $stmt = static::$pdo->query($sql);

        $tableData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$tableData) return null;

        $records = [];

        foreach ($tableData as $row) {
            $ar_obj = new static();

            foreach ($row as $key => $value) {
                $ar_obj->$key = $value;
            }
            $records[] = $ar_obj;
        }

        return $records;
    }

    public function delete()
    {
        $sql = "DELETE FROM " . static::$tablename . " WHERE ID=" . $this->id;
        $stmt = static::$pdo->query($sql);
        if ($stmt) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            print_r(static::$pdo->errorInfo());
        }
    }


    public function save()
    {
        foreach (static::$dbfields as $field => $type) {
            $holder = $this->$field;
            static::$dbfields[$field] = $holder;
        }
        $dbfields = "`" . implode('`, `', array_keys(static::$dbfields)) . "`";
        $prepareStr = ":" . implode(', :', array_keys(static::$dbfields));

        $sql = "INSERT INTO " . static::$tablename . " ($dbfields) VALUES ($prepareStr)";
        static::$pdo->prepare($sql)->execute(static::$dbfields);

    }
}