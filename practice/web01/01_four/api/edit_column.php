<?php
include_once './db.php';


// 先處理傳過來的table
// 儲存成db
$table = $_POST['table'];
$db = ${ucfirst($table)};
unset($_POST['table']);

$db->save($_POST);
to("../backend.php?do=$table");
?>