<h3 class="cent">新增最新消息資料</h3>
<hr>
<form method="post" action="./api/insert.php" enctype="multipart/form-data">
    <div class="cent">
        <label for="img">最新消息資料：</label>
        <textarea name="text" id="" style="width: 200px;height:60px;"></textarea>
    </div>
    <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
    <input type="submit" value="新增"><input type="reset" value="重置">

</form>