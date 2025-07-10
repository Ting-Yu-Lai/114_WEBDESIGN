<?php
session_start();
date_default_timezone_set("Asia/Taipei");

function to ($url) {
    "Location: $url";
}

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "<pre>";
}

class DB
{

    private $table;
    private $pdo;
    private $dsn = "mysql:host=localhost;dbname=db04;charset=utf8";

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function a2s($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
    }

    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function e($sql)
    {
        return $this->pdo->exec($sql);
    }

    function all(...$arg)
    {
        if (isset($arg[0])) {
            $sql = "SELECT * FROM $this->table ";
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }

            if (isset($arg[1])) {
                $sql .= $arg[1];
            }
        }
        return $this->q($sql);
    }
    function count(...$arg)
    {
        if (isset($arg[0])) {
            $sql = "SELECT COUNT(*) FROM $this->table ";
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }

            if (isset($arg[1])) {
                $sql .= $arg[1];
            }
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($id)
    {
            $sql = "SELECT * FROM $this->table ";
            if (is_array($id)) {
                $tmp = $this->a2s($id);
                $sql .= " WHERE " . join(" AND ", $tmp);
            } else {
                $sql .= " WHERE `id` = '$id'";
            }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id)
    {
            $sql = "DELETE FROM $this->table ";
            if (is_array($id)) {
                $tmp = $this->a2s($id);
                $sql .= " WHERE " . join(" AND ", $tmp);
            } else {
                $sql .= " WHERE `id` = '$id'";
            }

        return $this->e($sql);
    }


    function sav($array) {
        if(isset($array['id'])) {
            $sql = "UPDATE $this->table SET";
            $tmp = $this->a2s($sql);
            $sql .= join(" , ",$tmp) . " WHERE `id`='{$array['id']}'";
        }else {
            $sql = "INSERT INTO $this->table";
            $keys = "`" . join("`,`",array_keys($array)) . "`";
            $values = "'" . join("','",array_values($array)) . "'";
            $sql .= "($keys) VALUES ($values) ";
        }
        return $this->e($sql);
    }


}

$Title = new DB('title');
$Ad = new DB('ad');
$Admin = new DB('admin');
$Menu = new DB('menu');
$Image = new DB('image');
$Mvim = new DB('mvim');
$Total = new DB('total');
$Bottom = new DB('bottom');
$News = new DB('news');
