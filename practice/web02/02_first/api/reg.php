<?php
include_once "db.php";
dd($_POST);
// 建立資料是用POST所以使用POST處理
unset($_POST['pw2']);
// 資料庫exec()成功就會回傳1了 所以這邊可以直接使用echo回傳1
echo $User->save($_POST);

?>