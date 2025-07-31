<?php
$str = [
    'title' => [
        'header' => '更換標題區圖片',
        'label' => '標題區圖片'
    ],
    'mvim' => [
        'header' => '更換標題區圖片',
        'label' => '標題區圖片'
    ],
    'image' => [
        'header' => '更換標題區圖片',
        'label' => '標題區圖片'
    ],
];

?>
<div class="cent">
    <h3><?=$str[$_GET['table']]['header'];?></h3>
</div>
<hr>
<form action="./api/update.php" method="post" enctype="multipart/form-data">

    <table class="cent" style="width: 70%;margin:auto;">
        <tr>
            <td style="width: 50%;"><?=$str[$_GET['table']]['label'];?>：</td>
            <td style="width: 100%;"><input type="file" name="img" id="img"></td>
        </tr>
    </table>
        <div class="cent">
            <!-- 我要把table傳出去 -->
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
            <button type="submit">更換</button><button type="reset">重置</button>
        </div>
</form>