<?php
$str = [
    'title' => [
        'header' => "更換標題區圖片",
        'label' => "標題區圖片"
    ],
    'mvim' => [
        'header' => "更換動畫圖片",
        'label' => "動畫圖片"
    ],
    'image' => [
        'header' =>  "更換校園映像圖片",
        'label' => "校園映像圖片"
    ],
]
?>
<h3><?= $str[$_GET['table']]['header']; ?></h3>
<hr>
<form action="./api/update.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="img"><?= $str[$_GET['table']]['label']; ?></label>
        <input type="file" name="img" id="img">
    </div>
    <div>

        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">

        <button type="submit">更換</button>
        <button type="reset">重置</button>
    </div>
</form>