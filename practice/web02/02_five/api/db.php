<?php
session_start();
date_default_timezone_set("Asia/Taipei");

$Type = [
    1 => "健康新知",
    2 => "菸害防治",
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
    header("location:{$url}");
}

class DB
{
    private $table;
    private $pdo;
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
        if ($arg[1]) {
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
        if ($arg[1]) {
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
        if ($arg[1]) {
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
        if ($arg[1]) {
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
            $sql = "insert into $this->table ";
            $tmp = $this->a2s($a);
            $sql .= join(" , ", $tmp) . " where `id` = {$a['id']}";
        } else {
            $sql = "update $this->table set ";
            $key = join("`,`", array_keys($a));
            $val = join("','", array_values($a));
            $sql .= "(`$key`) values ('$val') ";
        }
        return $this->pdo->exec($sql);
    }
}
