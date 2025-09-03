<?php

include_once "./db.php";

$data = ['news'=>$_POST['news'],'user'=>$_SESSION['login']];
// 如果有按過讚
$chk = $Log->count($data);
// 找到使用者案讚的文章
$news = $News->find($_POST['news']);
if($chk) {
    //那就刪除那筆資料
    $Log->del($data);
    // 文章的讚數順便減少
    $news['good']-=1;
}else {
    $Log->save($data);
    $news['good']+=1;
}
$News->save($news);
?>

