


<h3 class="cent">新增動態文字廣告</h3>
<hr>
<form method="post" action="./api/insert.php" enctype="multipart/form-data">
    <div class="cent">
        <label for="text">動態文字廣告：</label>
        <input type="text" name="text" id="text">
    </div>
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="submit" value="新增"><input type="reset" value="重置">

</form>