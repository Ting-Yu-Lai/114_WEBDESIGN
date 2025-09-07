<?php
include_once "db.php";

$data = ['news'=>$_GET['id'],'user'=>$_SESSION['login']];
$chk = $Log->count($data);

$news = $News->find($_GET['id']);
if($chk) {
    $Log->del($data);
    $news['good'] -= 1;
}else{
    $Log->save($data);
    $news['good'] += 1;
}
$News->save($news);
?>