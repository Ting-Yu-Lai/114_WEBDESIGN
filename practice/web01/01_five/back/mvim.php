<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">動畫圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td width="23%">操作</td>
                </tr>
                <?php
                $rows = ${ucfirst($do)}->all();
                foreach($rows as $row):
                ?>
                <tr class="cent">
                    <td width="45%">
                        <img src="./image/<?=$row['img'];?>" alt="" style="width: 135px;height:90px">
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" id="" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>" id="">
                    </td>
                    <td>
                        <input type="button" onclick="op('#cover','#cvr','./modal/update.php?id=<?=$row['id'];?>&table=<?= $do;?>')"
                            value="更新動畫">
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <input type="hidden" name="table" value="<?= $do;?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?= $do;?>.php?table=<?= $do;?>')"
                            value="新增動畫圖片"></td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>