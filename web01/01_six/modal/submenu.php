<?php include_once "../api/db.php"; ?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form method="post" action="./api/submenu.php" enctype="multipart/form-data">
    <div class="cent" style="width:70%;margin:auto;display:flex;">
        <div style="width: 44%;margin:auto;">
            <label for="text">次選單名稱</label>
        </div>
        <div style="width: 44%;margin:auto;">
            <label for="text">次選單連結網址</label>
        </div>
        <div>
            <label for="text">刪除</label>
        </div>
    </div>
    <?php
    $db = ${ucfirst($_GET['table'])};
    $rows = $db->all(['main_id' => $_GET['id']]);
    foreach ($rows as $row):
    ?>
        <div class="cent" style="width:70%;margin:auto;display:flex;">
            <div style="width: 44%;margin:auto;">
                <input type="text" name="text[]" value="<?= $row['text']; ?>">
            </div>
            <div style="width: 44%;margin:auto;">
                <input type="text" name="href[]" value="<?= $row['href']; ?>">
            </div>
            <div>
                <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
            </div>
        </div>
        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
    <?php endforeach; ?>
    <div id="add" class="cent"></div>
    <input type="hidden" name="main_id" value="<?= $_GET['id']; ?>">
    <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
    <input type="submit" value="修改確定"><input type="reset" value="重置">
    <input type="button" value="更多次選單" onclick="more()">

</form>
<script>
    function more() {
        let tmp = ` 
        <div class="cent" style="width:70%;margin:auto;display:flex;">
        
        <div style="width: 44%;margin:auto;" >
            <input type="text" name="text2[]" value="">
        </div>
        <div style="width: 44%;margin:auto;" >
            <input type="text" name="href2[]" value="">
        </div>
        </div>
        
        `;
        $('#add').append(tmp);
    }
</script>