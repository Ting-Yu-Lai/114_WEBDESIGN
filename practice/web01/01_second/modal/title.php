<h3>新增標題區圖片</h3>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="img">標題區圖片:</label>
        <input type="file" name="img" id="img">
    </div>    
    <div>
        <label for="text" >標題區替代文字:</label>
        <input type="text" name="text">
    </div>
    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <button type="submit">新增</button>
        <button type="reset">重置</button>
    </div>
</form>