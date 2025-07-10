<h3 class="cent">新增動態文字廣告</h3>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
<div class="cent">
    <label for="text">動態文字廣告：</label>
    <input type="text" name="text" id="text">
</div>    
<div class="cent">
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <button type="submit">新增</button>
    <button type="reset">重置</button>
</div>    
</form>

