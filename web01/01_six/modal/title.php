


<h3 class="cent">新增標題區圖片</h3>
<hr>
<form method="post" action="./api/insert.php" enctype="multipart/form-data">
    <div class="cent">
        <label for="img">標題區圖片：</label>
        <input type="file" name="img" id="img">
    </div>
    <div class="cent">
        <label for="text">標題區替代文字：</label>
        <input type="text" name="text" id="text">
    </div>
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="submit" value="新增"><input type="reset" value="重置">

</form>