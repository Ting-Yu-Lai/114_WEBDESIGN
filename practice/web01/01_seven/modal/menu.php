<div class="cent">新增主選單</div>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div class="cent">
        <label for="img">主選單名稱：</label>
        <input type="text" name="text" id="text">
    </div>
    <div class="cent">
        <label for="img">選單連結網址：</label>
        <input type="text" name="href" id="href">
    </div>
    <div class="cent">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
