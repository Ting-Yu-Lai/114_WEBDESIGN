<h3 class="cent">新增主選單</h3>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">  
<div class="cent">
    <label for="text">主選單單稱：</label>
    <input type="text" name="text" id="text">
</div>    
<div class="cent">
    <label for="text">選單連結網址：</label>
    <input type="text" name="href" id="text">
</div>    
<div class="cent">
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <button type="submit">新增</button>
    <button type="reset">重置</button>
</div>    
</form>

