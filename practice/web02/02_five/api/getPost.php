<?php
include_once "./db.php";
$rows = $News->find($_GET['postId']);
?>
<h2><?=$rows['title'];?></h2>
<?= nl2br($rows['text']);?>