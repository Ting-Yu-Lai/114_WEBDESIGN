<?php 

include_once "./db.php";
$user = $User->find(['mail'=>$_POST['mail']]);
if($user):
?>
您的密碼為:<?=$user['pw'];?>
<?php else:?>
    查無此資料
<?php endif;?>
