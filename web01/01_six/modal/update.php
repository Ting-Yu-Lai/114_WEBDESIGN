<?php
$str = [
    'title'=> [
        'header' => '更新標題區圖片',
        'label' => '標題區圖片',
    ],
    'mvim'=> [
        'header' => '更新動畫區圖片',
        'label' => '動畫區圖片',
    ],
    'image'=> [
        'header' => '更新校園映像區圖片',
        'label' => '校園映像區圖片',
    ],
    
]
?>


<h3 class="cent"><?=$str[$_GET['table']]['header'];?></h3>
<hr>
<form method="post" action="./api/update.php" enctype="multipart/form-data">
    <div class="cent">
        <label for="img"><?=$str[$_GET['table']]['label'];?>：</label>
        <input type="file" name="img" id="img">
    </div>
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <input type="submit" value="修改確定"><input type="reset" value="重置">

</form>