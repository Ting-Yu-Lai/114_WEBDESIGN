<?php 
include_once 'db.php';

$user = $Admin->count($_POST);

if($user) {
    $_SESSION['login'] = 1;
    to("../back.php?do=title");
}else {
    echo "
    <script>
    alert('帳號密碼錯誤');
    location.replace('../index.php?do=login');
</script>
    ";
}

?>

