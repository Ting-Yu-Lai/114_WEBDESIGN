<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="./api/edit_column.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="40%">頁尾版權資料</td>
                    <td width="60%"><input type="text" style="width: 90%;" name="bottom" value="<?=$db->find(1)['bottom'];?>" ></td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="id" value="1">
                    <input type="hidden" name="table" value="bottom">
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>