<?php
include_once './db.php';
dd($_POST);
$user = $Admin->count($_POST);
dd($user);
if($user) {
    $_SESSION['login'] =1;
    to("../backend.php");

}else {
    
    echo "<script>alert('帳號密碼錯誤');location.replace('../index.php?do=login');</script>";
}

?>