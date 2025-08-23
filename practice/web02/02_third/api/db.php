<?php

session_start();
date_default_timezone_set("Asia/Taipei");

$Type = [
    1 => "健康新知",
    2 => "菸害防制",
    3 => "癌症防治",
    4 => "慢性病防治",
];


function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function to($url)
{
    header("location:" . $url);
}

class DB
{
    private $table;
    private $pdo;
    private $dsn = "mysql:host=localhost;dbname=web02_01;charset=utf8";

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
        $sql  = "select * from $this->table ";
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
        $sql  = "select count(*) from $this->table ";
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
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

    function max($col, ...$arg)
    {
        $sql  = "select max($col) from $this->table ";
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
        $sql  = "select sum($col) from $this->table ";
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
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($id)
    {
        $sql  = "select * from $this->table ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" and ", $tmp);
        } else {
            $sql .= " where `id` = '$id'";
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    function del($id)
    {
        $sql  = "delete from $this->table ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" and ", $tmp);
        } else {
            $sql .= " where `id` = '$id'";
        }
        return $this->pdo->exec($sql);
    }

    function save($a) {
        if(isset($a['id'])) {
            $sql = "update $this->table set ";
            $tmp = $this->a2s($a);
            $sql .= join(" , ",$tmp) . " where `id` = '{$a['id']}'";
        }else {
            $sql = "insert into $this->table ";
            $keys = join("`,`",array_keys($a));
            $values = join("','",array_values($a));
            $sql .= "(`$keys`) values ('$values')";
        }
        return $this->pdo->exec($sql);
    }
}

$User = new DB('user');
$Visit = new DB('visit');
$News = new DB('news');
$Que = new DB('que');
$Log = new DB('log');

// 測試資料表連線
// $User->save(['acc'=>'test ','pw'=>'5678 ','email'=>'test@labor.gov.tw' ]);
// $User->save(['acc'=>'mem01','pw'=>'mem01','email'=>'mem01@labor.gov.tw']);
// $User->save(['acc'=>'mem02','pw'=>'mem02','email'=>'mem02@labor.gov.tw']);

// 如果沒有session記錄
if(!isset($_SESSION['visit'])) {
    // 先去搜尋有沒有今天的紀錄
    $today = $Visit->find(['date'=>date("Y-m-d")]);
    // 如果為空
    if(empty($today)) {
        // 如果沒有當天的紀錄 ，那就把當天資料儲存
        $Visit->save(['date'=>date("Y-m-d"),'visit'=>1]);
    } else {
        // 但如果有 就直接增加訪客數
        $today['visit']++;
        $Visit->save($today);
    }
    // 儲存session紀錄
    $_SESSION['visit'] = 1;
}

