<div class="cent">新增動態文字廣告</div>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div class="cent">
        <label for="img">動態文字廣告：</label>
        <input type="text" name="text" id="text">
    </div>
    <div class="cent">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
