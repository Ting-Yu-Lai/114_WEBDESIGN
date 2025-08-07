<?php 

include_once 'db.php';

$table = $_POST['table'];
$db = ${ucfirst($table)};
$user = $db->count($_POST);
if($user) {
    $_SESSION['login'] = 1;
    to("../back.php");
}else {
    echo "<script>alert('帳號密碼錯誤');location.replace('../index.php?do=login')</script>";
}

?>
