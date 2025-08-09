<?php
include_once "db.php";
$table = $_GET['table'];
$db = ${ucfirst($table)};

if(isset($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../image/".$_FILES['img']['name']);
    $row = $db->find($_GET['id']);
    $row['img'] = $_FILES['img']['name'];
    $db->save($row);
}

to("../back.php?do=$table");
?>