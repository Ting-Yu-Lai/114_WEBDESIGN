<h3>新增管理者帳號</h3>

<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="img">帳密：</label>
        <input type="text" name="acc" id="acc">
    </div>
    <div>
        <label for="text">密碼：</label>
        <input type="text" name="pw" id="pw">
    </div>
    <div>
        <label for="text">確認密碼：</label>
        <input type="password">
    </div>
    <div>
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <button type="submit">新增</button>
        <button type="reset">重置</button>
    </div>
</form>