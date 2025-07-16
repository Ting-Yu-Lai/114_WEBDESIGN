<?php include_once "db.php";

// if($User->find($_GET)) {
//     echo "您的密碼為:".$User->find($_GET)['pw'];
// }else {
//     echo '查無此資料';
// }

$user = $User->find($_GET);
if(empty($user)){
    echo "查無此資料";
} else {
    echo "您的密碼為:" .$user['pw'];
}
?>