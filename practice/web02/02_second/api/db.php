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
    header("Location:$url");
}


class DB
{
    private  $dsn = "mysql:host=localhost;dbname=db18;charset=utf8;";
    private  $pdo;
    private  $table;

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
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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

    function sum($col, ...$arg)
    {
        $sql = "SELECT sum($col) FROM $this->table ";
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
        return $this->pdo->exec($sql);
    }

    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "UPDATE $this->table SET ";
            $tmp = $this->a2s($array);
            $sql .= join(",", $tmp) . " WHERE `id` = '{$array['id']}'";
        } else {
            $sql = "INSERT INTO $this->table ";
            $keys = "`" . join("`,`", array_keys($array)) . "`";
            $values = "'" . join("','", array_values($array)) . "'";
            $sql .= "($keys) VALUES ($values)";
        }
        return $this->pdo->exec($sql);
    }
}

$User = new DB('users');
$Visit = new DB('visit');
$News = new DB('news');
$Que = new DB('que');
$Log = new DB('log');
// $User->save(['acc' => 'admin', 'pw' => '1234', 'email' => 'admin@labor.gov.tw']);
// $User->save(['acc' => 'test', 'pw' => '5678', 'email' => 'test@labor.gov.tw']);
// $User->save(['acc' => 'mem01', 'pw' => 'mem01', 'email' => 'mem01@labor.gov.tw']);
// $User->save(['acc' => 'mem02', 'pw' => 'mem02', 'email' => 'mem02@labor.gov.tw']);
// 我要紀錄瀏覽人數，所以我先檢查有沒有她，因為功能要分今日瀏覽跟總瀏覽，所以我要順便把今日資料存進去
if(!isset($_SESSION['visit'])) {
    // 有無存在這筆資料
    $v = $Visit->find(['date'=>date("Y-m-d")]);
    if(empty($v)) {
        $Visit->save(['date'=>date("Y-m-d"),'visit'=>1]);
    }else{
        // ++完之後
        $v['visit']++;
        // 要存進去
        $v = $Visit->save($v);
    }
    $_SESSION['visit']=1;
}