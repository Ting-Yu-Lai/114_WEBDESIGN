<?php include_once "db.php";
unset($_POST['pw2']);

echo $User->save(['acc' => $_POST['acc'], 'pw' => $_POST['pw'], 'email' => $_POST['email']]);
?>