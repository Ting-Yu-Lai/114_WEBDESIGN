<?php

session_start();
date_default_timezone_set("Asia/Taipei");

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
function to($url)
{
    header("location:{$url}");
}



$Type = [
    1 => "健康新知",
    2 => "菸害防治",
    3 => "癌症防治",
    4 => "慢性病防治",
];

class DB
{
    private $pdo;
    private $table;
    private $dsn = "mysql:host=localhost;dbname=web02_03;charset=utf8";

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function a2s($a)
    {
        $tmp = [];
        foreach ($a as $k => $v) {
            $tmp[] = "`$k` = '$v'";
        }
        return $tmp;
    }

    function all(...$arg)
    {
        $sql = "select * from $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" and ", $tmp);
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
        $sql = "select count(*) from $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" and ", $tmp);
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
        $sql = "select sum($col) from $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" and ", $tmp);
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
        $sql = "select max($col) from $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" and ", $tmp);
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
        $sql = "select * from $this->table ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" and ", $tmp);
        } else {
            $sql .= " where `id` = '$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id)
    {
        $sql = "delete from $this->table ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" and ", $tmp);
        } else {
            $sql .= " where `id` = '$id'";
        }
        return $this->pdo->exec($sql);
    }


    function save($a)
    {
        if (isset($a['id'])) {
            $sql = "update $this->table set ";
            $tmp = $this->a2s($a);
            $sql .= join(" , ", $tmp) . " where `id` = {$a['id']}";
        } else {
            $sql = "insert into $this->table ";
            $key = join("`,`", array_keys($a));
            $val = join("','", array_values($a));
            $sql .= "(`$key`) values ('$val')";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }
}

$Visit = new DB('visit');
$Que = new DB('que');
$Log = new DB('log');
$User = new DB('user');
$News = new DB('news');

// $User->save(['acc'=>'admin','pw'=>'1234','mail'=>'admin@labor.gov.tw']);
// $User->save(['acc'=>'test','pw'=>'5678','mail'=>'test@labor.gov.tw']);
// $User->save(['acc'=>'mem01','pw'=>'mem01','mail'=>'mem01@labor.gov.tw']);
// $User->save(['acc'=>'mem02','pw'=>'mem02','mail'=>'mem02@labor.gov.tw']);


if(!isset($_SESSION['visit'])) {
    $today = $Visit->find(['date'=>date("Y-m-d")]);
    if(empty($today)) {
        $Visit->save(['date'=>date("Y-m-d"),'visit'=>1]);
    }else{
        $today['visit']++;
        $Visit->save($today);
    }
    $_SESSION['visit'] = 1;
}