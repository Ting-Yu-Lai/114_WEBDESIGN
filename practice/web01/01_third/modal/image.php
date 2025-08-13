<h3>新增校園映像圖片</h3>

<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="img">校園映像圖片：</label>
        <input type="file" name="img" id="img">
    </div>
    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <button type="submit">新增</button>
        <button type="reset">重置</button>
    </div>
</form>
