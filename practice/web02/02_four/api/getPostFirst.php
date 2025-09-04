<?php
include_once "./db.php";
$post = $News->find($_GET['id']);
?>
<h3><?=$post['title'];?></h3>
<?=nl2br($post['text']);?>