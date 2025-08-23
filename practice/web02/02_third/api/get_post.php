<?php

include_once "db.php";

$posts = $News->find($_GET['id']);
?>
<h3><?=$posts['title'];?></h3>
<!-- 運用nl2br 讓文章換行 方便閱讀 -->
<?=nl2br($posts['text']);?>