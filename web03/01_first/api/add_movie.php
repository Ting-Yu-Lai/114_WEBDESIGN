<?php
include_once "db.php";
// 兩筆照片的檔案移動
if(!empty($_FILES['poster']['tmp_name'])) {
    move_uploaded_file($_FILES['poster']['tmp_name'],'../image/'.$_FILES['poster']['name']);
    $_POST['poster'] = $_FILES['poster']['name'];
}

if(!empty($_FILES['trailer']['tmp_name'])) {
    move_uploaded_file($_FILES['trailer']['tmp_name'],'../image/'.$_FILES['trailer']['name']);
    $_POST['trailer'] = $_FILES['trailer']['name'];
}
// 處理年月份
$_POST['ondate'] = "{$_POST['year']}-{$_POST['month']}-{$_POST['day']}";
unset($_POST['year']);
unset($_POST['month']);
unset($_POST['day']);

$_POST['sh']=1;
$_POST['rank'] = $Movie->max('rank')+1;

$Movie->save($_POST);

to("../back.php?do=movie.php");