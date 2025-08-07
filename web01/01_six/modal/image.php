


<h3 class="cent">新增動畫圖片</h3>
<hr>
<form method="post" action="./api/insert.php" enctype="multipart/form-data">
    <div class="cent">
        <label for="img">動畫圖片：</label>
        <input type="file" name="img" id="img">
    </div>
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="submit" value="新增"><input type="reset" value="重置">

</form>