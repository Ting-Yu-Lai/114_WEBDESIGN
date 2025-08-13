<?php
include_once "./db.php";

dd($_POST);
$table = $_POST['table'];
$db = ${ucfirst($table)};
// $row = $db->find($_POST['id']);
// $row['table']=$_POST['table'];
unset($_POST['table']);
$db->save($_POST);


to("../backend.php?do=$table");
?>
