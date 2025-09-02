<?php
include_once "db.php";
$_POST['acc'] = $_SESSION['login'];
$_POST['items'] = serialize(($_SESSION['cart']));
$_POST['no'] = date("Ymd").rand(100000,99999);
$Order->save($_POST);
//清空購物車 題目沒要求
unset($_SESSION['cart']);
to("../index.php");
?>