


<h3 class="cent">新增標題區圖片</h3>
<hr>
<form method="post" action="./api/insert.php" enctype="multipart/form-data">
    <div class="cent">
        <label for="text">帳號：</label>
        <input type="text" name="acc" id="acc">
    </div>
    <div class="cent">
        <label for="text">密碼：</label>
        <input type="password" name="pw" id="pw">
    </div>
    <div class="cent">
        <label for="text">確認密碼：</label>
        <input type="password">
    </div>
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="submit" value="新增"><input type="reset" value="重置">

</form>