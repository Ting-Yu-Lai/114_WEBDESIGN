<?php
session_start();
date_default_timezone_set("Asia/Taipei");
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function q($sql) {
    $dsn = "mysql:host=localhost;dbname=db01;charset=utf8";
    $pdo = new PDO($dsn, 'root', "");
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url) {
    header("location:".$url);
}


class DB {
    private $dsn = "mysql:host=localhost;dbname=db01;charset=utf8";
    private $pdo;
    private $table;

    function __construct($table)
    {
        $this->table;
        $this->pdo = new PDO ($this->dsn, 'root' ,'');
    }

    function a2s($array) {
        $tmp = [];
        foreach($array as $key => $value) {
            $tmp[] = "`$key` = '$value'";
        }
        return $tmp;
    }

    function q($sql) {
        $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function all(...$arg) {
        $sql = "SELECT * FROM $this->table";
        if(isset($arg[0])) {
            if(is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql = $sql . " WHERE " .join(" AND ", $tmp); 
            }else {
                $sql .= $arg[0];
            }
            $sql .= $arg[1];
        }
        return $this->q($sql);
    }

    function find($id) {
        $sql = "SELECT * FROM $this->table";
        if(is_array($id)) {
            $tmp = $this->a2s($id);
            $sql = $sql . " WHERE " . join(" AND ",$tmp);
        } else {
            $sql .= " WHERE `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

}