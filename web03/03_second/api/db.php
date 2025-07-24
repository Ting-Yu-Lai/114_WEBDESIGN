<?php
session_start();
date_default_timezone_set("Asia/Taipei");

function a2s($array) {
    $tmp = [];
    foreach($array as $key => $value) {
        $tmp[]="`$key` = '$value'";
    }
    return $tmp;
}

function to($url) {
    header("Location:$url");
}

class DB {
    private $dsn = "mysql:host=localhost;dbname=web03;charset=utf8;";
    private $table;
    private $pdo;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function a2s($array) {
    $tmp = [];
    foreach($array as $key => $value) {
        $tmp[]="`$key` = '$value'";
    }
    return $tmp;
    }
    function q($sql) {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function all(...$arg) {
        $sql = "SELECT * FROM $this->table ";
        if(isset($arg[0])) {
            if(is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " WHERE " . join(" AND ",$tmp);
            }else{
                $sql .= $arg[0];
          }
        }
         if(isset($arg[1])) {
            $sql .= $arg[1];
         }
         return $this->q($sql);
    }
    function count(...$arg) {
        $sql = "SELECT COUNT(*) FROM $this->table ";
        if(isset($arg[0])) {
            if(is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " WHERE " . join(" AND ",$tmp);
            }else{
                $sql .= $arg[0];
          }
        }
         if(isset($arg[1])) {
            $sql .= $arg[1];
         }
         return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($col,...$arg) {
        $sql = "SELECT SUM($col) FROM $this->table ";
        if(isset($arg[0])) {
            if(is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " WHERE " . join(" AND ",$tmp);
            }else{
                $sql .= $arg[0];
          }
        }
         if(isset($arg[1])) {
            $sql .= $arg[1];
         }
         return $this->pdo->query($sql)->fetchColumn();
    }

    function max($col,...$arg) {
        $sql = "SELECT max($col) FROM $this->table ";
        if(isset($arg[0])) {
            if(is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " WHERE " . join(" AND ",$tmp);
            }else{
                $sql .= $arg[0];
          }
        }
         if(isset($arg[1])) {
            $sql .= $arg[1];
         }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($id) {
        $sql = "SELECT FROM $this->table ";
        if(is_array($id)) {
                $tmp = $this->a2s($id);
                $sql .= " WHERE " . join(" AND ",$tmp);
            }else{
                $sql .= " WHERE `id` = '$id'";
          }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($id) {
        $sql = "DELETE FROM $this->table ";
        if(is_array($id)) {
                $tmp = $this->a2s($id);
                $sql .= " WHERE " . join(" AND ",$tmp);
            }else{
                $sql .= " WHERE `id` = '$id'";
          }
        return $this->pdo->exec($sql);
    }

    function save($array) {
        if(isset($array['id'])) {
            $sql = "UPDATE $this->table SET ";
            $tmp = $this->a2s($array);
            $sql .= join(",",$tmp) . " WHERE `id` = '{$array['id']}'";
        }else{
            $sql = "INSERT INTO $this->table ";
            $key = "`" . join("`,`",array_keys($array)) . "`";
            $value = "'" . join("','",array_values($array)) . "'";
            $sql .= "($key) VALUES ($value)";
        }
        return $this->pdo->exec($sql);
    }
}

$Poster = new DB('poster');

?>