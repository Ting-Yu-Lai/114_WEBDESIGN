<div style="height: 400px;">
    <h3 class="ct" style="margin: auto;">預告片清單</h3>
</div>
<hr>
<div style="height: 100px;">
    <h3 class="ct" style="margin: auto;">新增預告片</h3>
    <form action="./api/addRr.php" method="post" enctype="multipart/form-data">
        <table class="ct" style="width: 100%;margin:auto;">
            <tr class="ct">
                <td>
                    <label for="img">預告片海報: </label><input type="file" name="img" id="img">
                </td>
                <td>
                    <label for="name">預告片片名: </label><input type="text" name="name" id="name">
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="清除">
        </div>
    </form>

</div>