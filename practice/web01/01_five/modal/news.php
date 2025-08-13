<div class="cent">
    <h3>新增最新消息資料</h3>
</div>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">

    <table class="cent" style="width: 70%;margin:auto;">
        <tr>
            <td style="width: 50%;" >最新消息資料：</td>
            <td style="width: 100%;" ><textarea name="text" id="" style="width: 300px;height:150px;"></textarea></td>
        </tr>
        </table>
        <div class="cent">
            <!-- 我要把table傳出去 -->
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <button type="submit">新增</button><button type="reset">重置</button>
        </div>
</form>