<?php
session_start();
date_default_timezone_set("Asia/Taipei");

function a2s($array)
{
    $tmp = [];
    foreach ($array as $key => $value) {
        $tmp[] = "`$key`='$value'";
    }
}

function q($sql)
{
    $dsn = "mysql:host=localhost;dbname=db09;charset=utf8";
    $pdo = new PDO($dsn, "", "");
    return  $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function to($url)
{
    header("Location: $url");
    exit();
} 

class DB
{
    private $dsn = "mysql:host=localhost;dbname=db09;charset=utf8";
    private $pdo;
    private $table;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function e($sql)
    {
        return $this->pdo->exec($sql);
    }

    function q($sql)
    {
        return  $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function a2s($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }

    function all(...$arg)
    {
        $sql = "SELECT * FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->q($sql);
    }

    function count(...$arg)
    {
        $sql = "SELECT COUNT(*) FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " WHERE " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql .= $arg[1];
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
            $sql .= " WHERE `id`='$id'";
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
            $sql .= " WHERE `id`='$id'";
        }
        return $this->e($sql);
    }

    function save($array)
    {
        if (isset(($array['id']))) {
            $sql = "UPDATE $this->table SET ";
            $tmp = $this->a2s($array);
            $sql .= join(" , ", $tmp) . " WHERE `id`='{$array['id']}'";
        } else {
            $keys = "`" . join("`,`", array_keys($array)) . "`";
            $values = "'" . join("','", array_values($array)) . "'";

            $sql = "INSERT INTO `$this->table` ($keys) VALUES ($values)";
        }
        return $this->e($sql);
    }
}

$Title = new DB('title');
$Ad = new DB('ad');
$Total = new DB('total');
$Bottom = new DB('bottom');
$Image = new DB('image');
$News = new DB('news');
$Menu = new DB('menu');
$Mvim = new DB('mvim');
$Admin = new DB('admin');

if(!isset($_SESSION['visit'])) {
    // firsttime open web
    $t = $Total->find(1);
    $t['total']++;
    $Total->save($t);
    $_SESSION['visit']=1;
} 