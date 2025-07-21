<?php
include_once 'db.php';

$data = ['news'=>$_POST['news'],'user'=>$_SESSION['login']];
$chk = $Log->count($data);

$news= $News->find($_POST['news']);
// 如果已經有這筆資料了
if($chk) {
    // 就把good讚減少，並且把那個log刪除
    $Log->del($data);
    $news['good']-=1;
}else{
    $Log->save($data);
    $news['good']+=1;
}
$News->save($news);