<?php
include_once "db.php";

$table = ${$_POST['table']};
$id = $_POST['id'];
$sw = $_POST['sw'];

$row1 = $table->find($id);
$row2 = $table->find($sw);

[[$row1], [$row2]] = [[$row2], [$row1]];
$table->save($row1);
$table->save($row2);

?>