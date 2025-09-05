<?php 

include_once "./db.php";

$chk = $User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk) {
    $_SESSION['login'] = $_POST['acc'];
    echo 1;
}else{
    echo 0;
}

?>