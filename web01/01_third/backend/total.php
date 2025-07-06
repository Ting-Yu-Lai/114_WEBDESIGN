<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>
    <form method="post" action="./api/edit_column.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%">進站總人數：</td>
                    <?php
                    $row = $Total->find(1);?>
                    <td width="50%">
                        <input type="text" name="total" id="" value="<?= $row['total']; ?>">
                    </td>
                </tr>
            </tbody>
            <input type="hidden" name="id" value="<?=$row['id'];?>">
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <!-- 我們要把input table 傳送給edit去做ucfirst()資料表讀取匯入 -->

                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>