<?php
include_once "db.php";

$chk = $User->count(['acc'=>$_GET['acc'],'pw'=>$_GET['pw']]);
var_dump($_SESSION);    
if($chk) {
    echo 1;
    $_SESSION['login'] = $_GET['acc'];
}else {
    echo 0;
}

?>