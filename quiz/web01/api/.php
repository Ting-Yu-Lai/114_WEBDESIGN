<?php 
include_once 'db.php';

$user = $Admin->count($_POST['acc']);
if($user) {
    $_SESSION['login'] = 1;
    echo '帳號密碼成功';
}else {
    echo "
    <script>
        alert('登入失敗');
        location.replace('?do=login');
    </script>
    ";
}
?>
