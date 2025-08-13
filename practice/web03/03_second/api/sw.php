<?php
include_once "db.php";
$table = ${$_POST['table']};
$r1 = $table->find($_POST['id']);
$r2 = $table->find($_POST['sw']);

[$r1['rank'], $r2['rank']] = [$r2['rank'], $r1['rank']];

$table->save($r1);
$table->save($r2);
?>