<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>
    <form method="post" action="./api/edit_column.php">
        <table width="100%">
            <tbody>
                <?php
                $rows = $db->all();
                foreach($rows as $row):?>
                <tr class="yel">
                    <td width="45%">進站總人數：</td>
                    <td width="23%">
                        <input type="text" name="total" id="text" value="<?=$row['total'];?>">
                    </td>
                </tr>
                <input type="hidden" name="id" value="<?=$row['id'];?>">
                <input type="hidden" name="table" value="<?=$do;?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>