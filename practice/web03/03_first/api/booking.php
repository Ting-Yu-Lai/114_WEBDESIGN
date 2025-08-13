<?php 
include_once 'db.php';


$_POST['tickets'] = count($_POST['seats']);
// 丟過來的狀態是陣列所以要把它序列化變成字串
$_POST['seats'] = serialize($_POST['seats']);
$_POST['no'] = date("Y-m-d");
$maxNO = $Order->max('id')+1;
$_POST['no'] .= sprintf("%04d",$maxNO); 
$Order->save($_POST);

echo $_POST['no'];
?>