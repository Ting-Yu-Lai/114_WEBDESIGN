<?php
include_once './db.php';

// var_dump($_FILES);
if(!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}

// 先處理傳過來的table
// 儲存成db
$table = $_POST['table'];
$db = ${ucfirst($table)};

switch($table) {
    case 'title':
        // 讓sh都等於0
        $_POST['sh']=0;
    break;
    case 'admin':
    break;
    default:
        $_POST['sh']=1;
}

// 把table清除
unset($_POST['table']);
// 才可以直接把post儲存
$db->save($_POST);

to("../backend.php?do=$table");
?>