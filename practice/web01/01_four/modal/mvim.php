<h3 class="cent">新增動畫圖片</h3>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
<div class="cent">
    <label for="img">動畫圖片：</label>
    <input type="file" name="img" id="img">
</div>    
<div class="cent">
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <button type="submit">新增</button>
    <button type="reset">重置</button>
</div>    
</form>

