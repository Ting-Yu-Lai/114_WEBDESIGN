<div class="cent">
    <h3>新增動畫圖片</h3>
</div>
<hr>
<form action="./api/insert.php" method="post" enctype="multipart/form-data">

    <table class="cent" style="width: 70%;margin:auto;">
        <tr>
            <td style="width: 50%;">動畫圖片：</td>
            <td style="width: 100%;"><input type="file" name="img" id="img"></td>
        </tr>
        </table>
        <div class="cent">
            <!-- 我要把table傳出去 -->
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <button type="submit">新增</button><button type="reset">重置</button>
        </div>
</form>