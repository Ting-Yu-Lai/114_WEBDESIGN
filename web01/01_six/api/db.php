<?php

date_default_timezone_set("Asia/Taipei");
session_start();

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function q($sql)
{
    $dsn = "mysql:host=localhost;dbname=web01_06;charset=utf8";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url)
{
    header("Location:$url");
}

class DB
{
    private $table;
    private $pdo;
    private $dsn = "mysql:host=localhost;dbname=web01_06;charset=utf8";


    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function e($sql)
    {
        return $this->pdo->exec($sql);
    }

    function a2s($a)
    {
        $tmp = [];
        foreach ($a as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
    }

    function all(...$arg)
    {
        $sql = "SELECT * FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$arg)
    {
        $sql = "SELECT COUNT(*) FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function max($col, ...$arg)
    {
        $sql = "SELECT max($col) FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" AND ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($col, ...$arg)
    {
        $sql = "SELECT sum($col) FROM $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" AND ", $tmp);
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
            $sql .= " where " . join(" AND ", $tmp);
        } else {
            $sql .= " where `id` = '$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    function del($id)
    {
        $sql = "DELETE FROM $this->table ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" AND ", $tmp);
        } else {
            $sql .= " where `id` = '$id'";
        }
            return $this->pdo->exec($sql);
    }

    function save($a) {
        if(isset($a['id'])) {
            $sql = " UPDATE $this->table SET ";
            $tmp = $this->a2s($a);
            $sql .= join(" , ",$tmp) . " where `id` = '{$a['id']}'";
            return $this->pdo->exec($sql);
        }else {
            $sql = " insert into $this->table ";
            $keys = "`" . join("`,`",array_keys($a)) . "`";
            $values = "'" . join("','",array_values($a)) . "'";
            $sql .= "($keys) values ($values)";
            return $this->pdo->exec($sql);
        }
    }
}

$Title = new DB('title');
$Total = new DB('total');
$Mvim = new DB('mvim');
$Image = new DB('image');
$Bottom = new DB('bottom');
$Admin = new DB('admin');
$News = new DB('news');
$Menu = new DB('menu');
$Ad = new DB('ad');

if(!isset($_SESSION['visit'])) {
 $t = $Total->find(1);
 $t['total']++;
 $Total->save($t);
 $_SESSION['visit'] =1;
}