<?php
include_once "./db.php";
echo $User->count(['acc'=>$_GET['acc']]);
?>