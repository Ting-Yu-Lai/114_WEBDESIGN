<?php include_once "../api/db.php";?>
<div class="cent">編輯次選單</div>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <?php
    $rows = $Menu->all(['main_id'=>$_GET['id']]);
    foreach($rows as $row):
    ?>
    <div class="cent" style="display: flex;justify-content:space-evenly;align-items:center;flex-wrap:wrap;">
        <div style="width: 45%;">
            <label for="img">次選單名稱：</label>
            <input type="text" name="text[]" value="<?= $row['text'];?>">
        </div>
        <div style="width: 45%;">
            <label for="img">次選單連結網址：</label>
            <input type="text" name="href[]" value="<?= $row['href'];?>">
        </div>
        <div style="width: 10%;">
            <label for="img">刪除</label>
            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
        </div>
    </div>
    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
    <?php endforeach;?>
    <div class="cent" id="add" style="display: flex;justify-content:space-evenly;align-items:center;flex-wrap:wrap;"></div>
    <div class="cent">
        <input type="hidden" name="main_id" value="<?=$_GET['id'];?>">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>
<script>
    function more(){
        let tmp =`
        <div style="width: 50%;">
            <label for="img">次選單名稱：</label>
            <input type="text" name="text2[]" value="">
        </div>
        <div style="width: 50%;">
            <label for="img">次選單連結網址：</label>
            <input type="text" name="href2[]" value="">
        </div>
        `;
        
        $("#add").append(tmp);
    }
</script>