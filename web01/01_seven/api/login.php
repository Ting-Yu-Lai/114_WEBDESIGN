<?php
include_once 'db.php';


$usr = $Admin->count($_POST);
if($usr) {
    //要儲存login
    $_SESSION['login'] = 1;
    to("../back.php");
}else {
  echo  "<script>
        alert('帳號密碼錯誤');
        location.replace('../index.php?do=login')
    </script>
";
}
?>