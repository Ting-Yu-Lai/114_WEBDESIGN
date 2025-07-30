<div class="cent">
    <h3>新增標題區圖片</h3>
</div>
<hr>
<form action="./api/add_title.php" method="post" enctype="multipart/form-data">

    <table class="cent" style="width: 70%;margin:auto;">
        <tr>
            <td style="width: 50%;">標題區圖片：</td>
            <td style="width: 100%;"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <td style="width: 50%;" >標題區替代文字：</td>
            <td style="width: 100%;" ><input type="text" name="text" id="text"></td>
        </tr>
        </table>
        <div class="cent">
            <button type="submit">新增</button><button type="reset">重置</button>
        </div>
</form>