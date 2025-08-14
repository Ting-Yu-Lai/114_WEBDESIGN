<?php 
include_once 'db.php';

$user = $Admin->count($_POST['acc']);
if($user) {
    $_SESSION['login'] = 1;
    to("../back.php?do=title");    
}else {
    echo "
    <script>
        alert('帳號或密碼輸入錯誤');
        location.replace('?do=login');
    </script>
    ";
}
?>
