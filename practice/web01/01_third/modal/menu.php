<h3>新增主選單</h3>

<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="text">主選單名稱：</label>
        <input type="text" name="text" id="text">
    </div>
    <div>
        <label for="">選單連結網址：</label>
        <input type="text" name="href" id="">
    </div>
    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <button type="submit">新增</button>
        <button type="reset">重置</button>
    </div>
</form>
