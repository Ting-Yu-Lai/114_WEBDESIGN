<?php

include_once "db.php";

$posts = $News->find($_GET['id']);
?>
<h3><?=$posts['title'];?></h3>
<?=nl2br($posts['text']);?>