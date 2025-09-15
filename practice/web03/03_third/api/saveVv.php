<?php
include_once 'db.php';

if(!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}

if(!empty($_FILES['trailer']['tmp_name'])) {
    move_uploaded_file($_FILES['trailer']['tmp_name'],"../image/".$_FILES['trailer']['name']);
    $_POST['trailer'] = $_FILES['trailer']['name'];
}

//處理日期字串串接
$_POST['ondate'] = "{$_POST['year']}-{$_POST['month']}-{$_POST['day']}";
unset($_POST['year'],$_POST['month'],$_POST['day']);
//沒有id就處理sh跟rank
if(!isset($_POST['id'])) {
    $_POST['sh']=1;
    $_POST['rank'] = $Vv->max('rank')+1;
}

$Vv->save($_POST);
to("../back.php?do=Vv");
?>