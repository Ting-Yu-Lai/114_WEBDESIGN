<?php 
include_once "db.php";


$user = $User->find($_GET);
// echo $User->count(['acc'=>$_GET['acc'],'pw'=>$_GET['pw']]);

if (empty($user)) {
    echo "查無此資料";
} else {
    echo "您的密碼為：".$user['pw'];
}
?>