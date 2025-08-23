<?php 
include_once "db.php";

//判斷有無資料
$data = ['news'=>$_POST['news'],'user'=>$_SESSION['login']];
$chk = $Log->count($data);

// 這邊的$_POST['news'] 是傳過來的id，用id去撈資料出來
$news = $News->find($_POST['news']);
//如果有資料的話代表我要做的動作是收回讚，所以刪掉資料
if($chk) {
    $Log->del($data);
    $news['good']-=1;
}else{
    $Log->save($data);
    $news['good']+=1;
}
$News->save($news);
?>