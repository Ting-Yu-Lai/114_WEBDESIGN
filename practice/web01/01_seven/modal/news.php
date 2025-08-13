<div class="cent">新增最新消息資料內容</div>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div class="cent">
        <label for="img">最新消息資料內容：</label>
        <textarea name="text" id="" style="width:300px;height:60px;"></textarea>
    </div>
    <div class="cent">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
