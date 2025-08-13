<div class="cent">
    <h3>新增動畫圖片</h3>
</div>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div class="cent">
        <label for="img">動畫圖片：</label>
        <input type="file" name="img" id="">
    </div>
    <div class="cent">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增"><input type="reset" value="重置">
    </div>
</form>