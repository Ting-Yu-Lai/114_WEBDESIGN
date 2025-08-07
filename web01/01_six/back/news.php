<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料內容</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                </tr>
                <?php
                $db = ${ucfirst($do)};
                $all = count($db->all());
                $div = 3;
                $n = $_GET['p']??1;
                $page = ceil($all / $div);
                $start = ($n - 1)*$div;
                $rows = $db->all(" limit $start, $div");
                foreach($rows as $row):
                ?>
                <tr class="">
                    <td width="80%" class="cent">
                        <textarea name="text" id="" style="width: 80%;height:50px;"><?=$row['text'];?>;</textarea>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="sh" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'' ;?>>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" id="" value="<?=$row['id'];?>">
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do;?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do;?>.php?table=<?= $do;?>')"
                            value="新增最新消息資料"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>