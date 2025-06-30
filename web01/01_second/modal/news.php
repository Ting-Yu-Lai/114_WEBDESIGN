<h3>新增最新消息內容</h3>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="text" >最新消息內容:</label>
        <textarea style="width:200px;height:100px;vertical-align:middle" type="text" name="text"></textarea>
    </div>
    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <button type="submit">新增</button>
        <button type="reset">重置</button>
    </div>
</form>