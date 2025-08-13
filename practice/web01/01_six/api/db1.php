<?php 

session_start();
date_default_timezone_set("Asia/Taipei");


function q($sql) {
    $dsn = "mysql:host=localhost;dbname=web01_06;charset=utf8;";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


function dd($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function to($url) {
    header("loction:".$url);
}

class DB {
    private $dsn = "mysql:host=localhost;dbname=web01_06;charset=utf8;";
    private $table;
    private $pdo;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO ($this->dsn, 'root', '');
    }

    function a2s($a) {
        $tmp =[];
        foreach($a as $k => $v) {
            $tmp[] = "`$k` = '$v'";
        }
        return $tmp;
    }

    function all(...$arg) {
        $sql = "select * from $this->table ";
        if(isset($arg[0])) {
            if(is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" AND ",$tmp);
            }else {
                $sql .= $arg[0];
            }
        }
         if(isset($arg[1])) {
                $sql .= $arg[1];
         }
         return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count(...$arg) {
        $sql = "select count(*) from $this->table ";
        if(isset($arg[0])) {
            if(is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" AND ",$tmp);
            }else {
                $sql .= $arg[0];
            }
        }
         if(isset($arg[1])) {
                $sql .= $arg[1];
         }
         return $this->pdo->query($sql)->fetchColumn();
    }


    function max($col, ...$arg) {
        $sql = "select max($col) from $this->table ";
        if(isset($arg[0])) {
            if(is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" AND ",$tmp);
            }else {
                $sql .= $arg[0];
            }
        }
         if(isset($arg[1])) {
                $sql .= $arg[1];
         }
         return $this->pdo->query($sql)->fetchColumn();
    }
    
    function sum($col, ...$arg) {
        $sql = "select sum($col) from $this->table ";
        if(isset($arg[0])) {
            if(is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" AND ",$tmp);
            }else {
                $sql .= $arg[0];
            }
        }
         if(isset($arg[1])) {
                $sql .= $arg[1];
         }
         return $this->pdo->query($sql)->fetchColumn();
    }

    function find($id) {
        $sql = "select * from $this->table ";
            if(is_array($id)) {
                $tmp = $this->a2s($id);
                $sql .= " where " . join(" AND ",$tmp);
            }else {
                $sql .= " where `id` = '$id'";
            }
        
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    function del($id) {
        $sql = "delete from $this->table ";
            if(is_array($id)) {
                $tmp = $this->a2s($id);
                $sql .= " where " . join(" AND ",$tmp);
            }else {
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
            $sql = "insert into $this->table";
            $keys = join("`,`",array_keys($a));
            $values = join("`,`",array_keys($a));
            $sql .= " (`$keys`) values ('$values')";
        }
        return $this->pdo->exec($sql);
    }

}