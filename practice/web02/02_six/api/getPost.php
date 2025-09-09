<?php
include_once "db.php";

$rows = $News->find(['id'=>$_GET['post']]);
// dd($rows);
?>
<h3><?=$rows['title'];?></h3>
<?=nl2br($rows['text']);?>