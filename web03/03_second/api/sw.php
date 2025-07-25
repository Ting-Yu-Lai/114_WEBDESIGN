<?php
include_once "db.php";

$row1 = $Poster->find($_POST['id1']);
$row2 = $Poster->find($_POST['id2']);

if ($row1 && $row2) {
    $tmp = $row1['rank'];
    $row1['rank'] = $row2['rank'];
    $row2['rank'] = $tmp;

    $Poster->save($row1); // 有 id，一定會 UPDATE，不會 INSERT
    $Poster->save($row2);
}
