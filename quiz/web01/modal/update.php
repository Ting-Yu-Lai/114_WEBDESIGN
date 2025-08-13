<?php
$str = [
    'title' => [
        'h' => "更新網站標題圖片",
        'l' => "標題區圖片：",
    ],
    'mvim' => [
        'h' => "更新動畫區圖片",
        'l' => "動畫區圖片：",
    ],
    'image' => [
        'h' => "更新校園映像資料圖片",
        'l' => "校園映像資料圖片：",
    ],
];
?>

<h3 class="cent"><?=$str[$_GET['table']]['h'];?></h3>
<hr>
<form action="./api/update.php" method="post" enctype="multipart/form-data">
    <div class="cent">
        <label for="img"><?=$str[$_GET['table']]['l'];?></label>
        <input type="file" name="img" id="">
    </div>
    <div class="cent">
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
        <input type="hidden" name="table" value="<?=$_GET['table']?>">
        <input type="submit" value="更新"><input type="reset" value="重置">
    </div>

</form>