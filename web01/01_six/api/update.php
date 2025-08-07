<?php 

include_once "db.php";
// dd($_POST);
// dd($_FILES);

$table = $_POST['table'];
$db = ${ucfirst($table)};

if(isset($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../image/".$_FILES['img']['name']);
    $row = $db->find($_POST['id']);
    // print_r($row);
    $row['img'] = $_FILES['img']['name'];
    // print_r($row);

    $db->save($row);
}

to("../back.php?do=$table");

?>