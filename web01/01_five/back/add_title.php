<div class="cent">
    <h3>新增標題區圖片</h3>
</div>
<hr>
<form action="./api/add_title.php" method="post" enctype="multipart/form-data">

    <table class="cent">
        <tr>
            <td>標題區圖片：</td>
            <td><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <td>標題區替代文字：</td>
            <td><input type="text" name="text" id="text"></td>
        </tr>
    </table>
</form>