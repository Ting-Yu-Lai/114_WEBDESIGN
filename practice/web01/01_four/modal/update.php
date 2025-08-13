<?php
$str = [
    'title' => [
        'header' => "更新網站標題圖片",
        "label" => "標題區圖片："
    ],
    'image' => [
        'header' => "更新校園映像圖片",
        "label" => "校園映像區圖片："
    ],
    'mvim' => [
        'header' => "更新動畫圖片",
        "label" => "動畫區圖片："
    ],
];

?>


<h3 class="cent">
    <?=$str[$_GET['table']]['header']; ?>
</h3>
<hr>
<form action="./api/update.php" method="post" enctype="multipart/form-data">
    <div class="cent">
        <label for="img"><?= $str[$_GET['table']]['label']; ?></label>
        <input type="file" name="img" id="img">
    </div>
    <div class="cent">
        <!-- 為什麼update要傳id，因為要針對個別id更新 -->
        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <button type="submit">更新</button>
        <button type="reset">重置</button>
    </div>
</form>