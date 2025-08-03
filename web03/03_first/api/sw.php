<?php
// include_once "db.php";

// $table = ${$_POST['table']};
// $id = $_POST['id'];
// $sw = $_POST['sw'];

// $row1 = $table->find($id);
// $row2 = $table->find($sw);

// [[$row1], [$row2]] = [[$row2], [$row1]];
// $table->save($row1);
// $table->save($row2);

include_once "db.php";

$table = $_POST['table'] ?? 'Movie';
$id = $_POST['id'] ?? 0;
$sw = $_POST['sw'] ?? 0;

$row1 = $Movie->find($id);
$row2 = $Movie->find($sw);

if ($row1 && $row2) {
    $temp = $row1['rank'];
    $row1['rank'] = $row2['rank'];
    $row2['rank'] = $temp;
    $Movie->save($row1);
    $Movie->save($row2);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => '無效的 ID']);
}
?>
