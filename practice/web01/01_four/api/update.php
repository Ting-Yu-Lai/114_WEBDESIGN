<?php
include_once './db.php';
// 先處理傳過來的table
// 儲存成db

// dd($_POST);
// dd($_FILES);

$table = $_POST['table'];
$db = ${ucfirst($table)};

// var_dump($_FILES);
if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../images/" . $_FILES['img']['name']);
    $row = $db->find($_POST['id']);
    $row['img'] = $_FILES['img']['name'];

    $db->save($row);
}


to("../backend.php?do=$table");
?>
