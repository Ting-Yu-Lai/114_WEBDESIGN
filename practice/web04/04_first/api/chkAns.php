<?php
include_once "db.php";

if($_GET['chk'] == $_SESSION['ans']) {
    echo 1;
}
// $chk = $User->count(['acc'=>$_GET['acc']]);
// if($chk) {
//     echo 1;
// }else {
//     echo 0;
// }
