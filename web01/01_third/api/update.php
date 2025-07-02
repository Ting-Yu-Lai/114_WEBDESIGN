<?php

include_once "./db.php";
dd($_POST);
dd($_FILES);

$table = $_POST['table'];
$db = ${ucfirst($table)};

if(!empty($_FILES['img']["tmp_name"])) {
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
    $row = $db->find($_POST['id']);
    $row['img'] = $_FILES['img']['name'];
    unset($_POST['table']);
    // 把find找到的id存進去
    $db->save($row);
}


to("../backend.php?do=$table");
?>

