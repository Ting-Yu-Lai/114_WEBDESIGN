<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="./api/edit_c.php">
        <table width="100%">
            <tbody>
                <?php
                $rows = ${ucfirst($do)}->all();
                foreach($rows as $row):
                ?>
                <tr class="yel">
                    <td width="60%">頁尾版權資料：</td>
                    <td width="60%">
                        <input style="width: 90%;" type="text" name="text" value="<?=$row['text'];?>" id="">
                    </td>
                </tr>
                <input type="hidden" name="id" value="<?=$row['id'];?>">
                <input type="hidden" name="table" value="<?= $do;?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>