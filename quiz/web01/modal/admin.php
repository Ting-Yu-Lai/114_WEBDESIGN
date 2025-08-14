<h3 class="cent">新增網站標題圖片</h3>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div class="cent">
        <label for="img">帳號：</label>
        <input type="text" name="acc" id="text">
    </div>
    <div class="cent">
        <label for="img">密碼：</label>
        <input type="password" name="pw" id="text">
    </div>
    <div class="cent">
        <label for="img">確認密碼：</label>
        <input type="password">
    </div>
    <div class="cent">
        <input type="hidden" name="table" value="<?=$_GET['table']?>">
        <input type="submit" value="新增"><input type="reset" value="重置">
    </div>

</form>