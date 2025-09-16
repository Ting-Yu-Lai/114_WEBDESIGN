<?php

session_start();
date_default_timezone_set("Asia/Taipei");


$vvLv = [
    1 => '普通級',
    2 => '輔導級',
    3 => '保護級',
    4 => '限制級',
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
};

class DB
{
    private $table;
    private $pdo;
    private $dsn = "mysql:host=localhost;dbname=web03_03;charset=utf8;";

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function as($a)
    {
        $tmp = [];
        foreach ($a as $k => $v) {
            $tmp[] = "`$k` = '$v'";
        }
        return $tmp;
    }

    function all(...$a)
    {
        $sql = "select * from $this->table ";
        if (isset($a[0])) {
            if (is_array($a[0])) {
                $tmp = $this->as($a[0]);
                $sql .= " where " . join(" and ", $tmp);
            } else {
                $sql .= $a[0];
            }
        }
        if (isset($a[1])) {
            $sql .= $a[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$a)
    {
        $sql = "select count(*) from $this->table ";
        if (isset($a[0])) {
            if (is_array($a[0])) {
                $tmp = $this->as($a[0]);
                $sql .= " where " . join(" and ", $tmp);
            } else {
                $sql .= $a[0];
            }
        }
        if (isset($a[1])) {
            $sql .= $a[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }
    
    function max($col,...$a)
    {
        $sql = "select max($col) from $this->table ";
        if (isset($a[0])) {
            if (is_array($a[0])) {
                $tmp = $this->as($a[0]);
                $sql .= " where " . join(" and ", $tmp);
            } else {
                $sql .= $a[0];
            }
        }
        if (isset($a[1])) {
            $sql .= $a[1];
        }
        echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
    
    function sum($col,...$a)
    {
        $sql = "select sum($col) from $this->table ";
        if (isset($a[0])) {
            if (is_array($a[0])) {
                $tmp = $this->as($a[0]);
                $sql .= " where " . join(" and ", $tmp);
            } else {
                $sql .= $a[0];
            }
        }
        if (isset($a[1])) {
            $sql .= $a[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($id)
    {
        $sql = "select * from $this->table";
        if (is_array($id)) {
            $tmp = $this->as($id);
            $sql .= " where " . join(" and ", $tmp);
        } else {
            $sql .= " where `id` = '$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id)
    {
        $sql = "delete from $this->table";
        if (is_array($id)) {
            $tmp = $this->as($id);
            $sql .= " where " . join(" and ", $tmp);
        } else {
            $sql .= " where `id` = '$id'";
        }
        return $this->pdo->exec($sql);
    }
    
    function save($a) {
        if(isset($a['id'])) {
            $sql = "update $this->table set ";
            $tmp = $this->as($a);
            $sql .= join(" , ",$tmp) . " where `id` = {$a['id']}";
        }else{
            $sql = "insert into $this->table ";
            $k = join("`,`",array_keys($a));
            $v = join("','",array_values($a));
            $sql .= "(`$k`) values ('$v')";
        }
        echo $sql;
        return $this->pdo->exec($sql);
    }
}

$Rr = new DB("rr"); //預告片
$Vv = new DB("vv"); //院線片