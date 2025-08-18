<?php
include_once "db.php";

$items =$Item->find($_POST['id']);
$item['sh']=$_POST['sh'];
$Item->save($item);

?>