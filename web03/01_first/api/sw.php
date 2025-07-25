<?php
include_once "db.php";

$table = ${$_POST['table']};
$id = $_POST['id'];
$sw = $_POST['sw'];

$row1 = $table->find($id);
$row2 = $table->find($sw);

if ($row1 && $row2) {
    $tmp_rank = $row1['rank'];
    $row1['rank'] = $row2['rank'];
    $row2['rank'] = $tmp_rank;

    $table->save($row1);
    $table->save($row2);
}
?>