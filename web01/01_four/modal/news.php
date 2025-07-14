<h3 class="cent">新增最新消息資料</h3>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
<div class="cent">
    <label for="text">最新消息資料：</label>
    <textarea name="text" id="text" style="width:90%;height:68px;"></textarea>
</div>    
<div class="cent">
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <button type="submit">新增</button>
    <button type="reset">重置</button>
</div>    
</form>

