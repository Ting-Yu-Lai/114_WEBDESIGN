<?php
session_start();
date_default_timezone_set("Asia/Taipei");

function to ($url) {
    header("location:$url");
}

function a2s($array)
{
    $tmp = [];
    foreach ($array as $key => $value) {
        $tmp[] = "`$key` = '$value'";
    }
    return $tmp;
}

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function q($sql)
{
    $dsn = "mysql:host=localhost;dbname:db02=charset=utf8";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

class DB
{
    private $dsn = "mysql:host=localhost;dbname=db02;charset=utf8";
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
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
            $tmp = $this->a2s($arg[0]);
            $sql .= ' WHERE ' . join(" AND ", $tmp);
        } else {
            $sql .= $arg[0];
        }
        if(isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->q($sql);
    }

    function find($id) {
        if(is_array($id)) {
            $tmp = $this->a2s($id);
            $sql = "SELECT * FROM $this->table WHERE ".join(" AND ", $tmp);
        }else{
            $sql = "SELECT * FROM $this->table WHERE `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id) {
        if(is_array($id)) {
            $tmp = $this->a2s($id);
            $sql = "DELETE FROM $this->table WHERE ".join(" AND ", $tmp);
        }else{
            $sql = "DELETE FROM $this->table WHERE `id`='$id'";
        }
        return $this->e($sql);
    }

    function save($array) {
        if(isset($array['id'])){
            $sql = "UPDATE $this->table SET ";
            $tmp =$this->a2s($array);
            $sql .= join(" , ",$tmp) . "WHERE `id`='{$array['id']}'";
        } else {
            $sql = "INSERT INTO $this->table ";
            $keys = join("`,`", array_keys($array));
            $values = join("','", array_values($array));
            $sql .= "(`$keys`) VALUES ('$values')";
        }
        return $this->e($sql);
    }
}

$Title=new DB('title');
?>