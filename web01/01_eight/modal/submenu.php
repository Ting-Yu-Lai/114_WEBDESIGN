<style>
    .box {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        margin:auto;
    }
</style>
<?php include_once "../api/db.php";?>

<div class="cent">
    <h3>編輯主選單</h3>
</div>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <div class="box">
        <div class="cent">
            <label for="text">次選單名稱</label>
            <!-- <input type="text" name="text" id=""> -->
        </div>
        <div class="cent">
            <label for="img">次選單連結網址</label>
            <!-- <input type="text" name="href" id=""> -->
        </div>
        <div class="cent">
            <label for="img">刪除</label>
            <!-- <input type="checkbox" name="del[]" value="" id=""> -->
        </div>
    </div>
    <?php $menus = $Menu->all(['main_id'=>$_GET['id']]);
    foreach($menus as $menu):?>
    <div class="box">
        <div class="cent">
            <input type="text" name="text[]" value="<?=$menu['text'];?>">
        </div>
        <div class="cent">
            <input type="text" name="href[]" value="<?=$menu['href'];?>">
        </div>
        <div class="cent">
            <input type="checkbox" name="del[]" value="<?=$menu['id'];?>">
        </div>
    </div>
    <input type="hidden" name="id[]" value="<?=$menu['id'];?>">
    <?php endforeach;?>
    <div id="add"></div>
    <div class="cent">
        <input type="hidden" name="main_id" value="<?=$_GET['id'];?>">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="修改"><input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>
<script>
    function more() {
        let tmp =`
        <div class="box">
        <div class="cent">
            <input type="text" name="text2[]" value="">
        </div>
        <div class="cent">
            <input type="text" name="href2[]" value="">
        </div>
        <div class="cent">
        </div>
    </div>
        `;
        $("#add").append(tmp);
    }
</script>