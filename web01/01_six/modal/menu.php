<?php include_once "../api/db.php";?>


<h3 class="cent">新增主選單</h3>
<hr>
<form method="post" action="./api/insert.php" enctype="multipart/form-data">
    <div class="cent">
        <label for="text">主選單名稱：</label>
        <input type="text" name="text" id="text">
    </div>
    <div class="cent">
        <label for="text">選單連結網址：</label>
        <input type="text" name="href" id="href">
    </div>
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="submit" value="新增"><input type="reset" value="重置">

</form>