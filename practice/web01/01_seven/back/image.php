<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園映像資料圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $all = count($db->all());
                $div = 3;
                $page = ceil($all / $div);
                $now = $_GET['p']??1;
                $start = ($now - 1)*$div;
                $rows = $db->all(" limit $start,$div");
                foreach($rows as $row):?>
                <tr class="cent">
                    <td width="70%">
                        <img src="./image/<?=$row['img'];?>" style="width: 100px;height:68px;" alt="">
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td width="7%"><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
                    <td><input type="button" onclick="op('#cover','#cvr','./modal/update.php?table=<?=$do;?>&id=<?=$row['id'];?>')"
                            value="更換圖片"></td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <input type="hidden" name="table" value="<?=$do;?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="cent">
            <?php if($now - 1 > 0):?>
                <a href="?do=<?=$do;?>&p=<?=$now - 1;?>"> < </a>
                <?php endif;?>
            <?php for($i=1;$i<=$page;$i++): $size = ($now == $i)?'24px':'';?>
                <a href="?do=<?=$do;?>&p=<?=$i;?>" style="font-size: <?=$size;?>;"><?=$i;?></a>
                <?php endfor;?>
            <?php if($now + 1 <= $page):?>
                <a href="?do=<?=$do;?>&p=<?=$now + 1;?>"> > </a>
                <?php endif;?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do?>.php?table=<?=$do;?>')"
                            value="新增校園映像圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>