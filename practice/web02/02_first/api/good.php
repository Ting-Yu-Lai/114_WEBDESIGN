<?php
include_once "./db.php";

// $_POST['news']
// $_SESSION['login']
// 除了Log要加1 還要再news增加good
$chk = $Log->count(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
$news = $News->find($_POST['news']);
if($chk) {
    $Log->del(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
    $news['good']-=1;
}else{
    $Log->save(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
    $news['good']+=1;
}
$News->save($news);
