<div class="cent">
    <h3>新增主選單</h3>
</div>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">

    <table class="cent" style="width: 70%;margin:auto;">
        <tr>
            <td style="width: 50%;" >主選單名稱：</td>
            <td style="width: 100%;" ><input type="text" name="text" id="text"></td>
        </tr>
        <tr>
            <td style="width: 50%;" >選單連結網址：</td>
            <td style="width: 100%;" ><input type="text" name="href" id="text"></td>
        </tr>
</table>
        <div class="cent">
            <!-- 我要把table傳出去 -->
             <input type="hidden" name="">
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <button type="submit">新增</button><button type="reset">重置</button>
        </div>
</form>