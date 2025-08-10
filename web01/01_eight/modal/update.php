<?php

$str = [
    'title' => [
        'header'=> "更新標題區圖片",
        'label' => "標題區圖片",
    ],
    'mvim' => [
        'header'=> "更新動畫區圖片",
        'label' => "動畫區圖片",
    ],
    'image' => [
        'header'=> "更新校園映像區圖片",
        'label' => "校園映像區圖片",
    ],
];

?>
<div class="cent">
    <h3><?=$str[$_GET['table']]['header'];?></h3>
</div>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div class="cent">
        <label for="img"><?=$str[$_GET['table']]['label'];?>：</label>
        <input type="file" name="img" id="">
    </div>
    <div class="cent">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="更新"><input type="reset" value="重置">
    </div>
</form>