<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
           <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料內容</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $all = count(${ucfirst($do)}->all());
                $div = 4;
                $pages = ceil($all / $div);
                $n = $_GET['p']??1;
                $start = ($n - 1)*$div;
                $rows = ${ucfirst($do)}->all(" limit $start,$div");
                foreach($rows as $row):
                ?>
                <tr class="cent">
                    <td width="80%">
                        <textarea name="text[]" style="width:70%;height:50px"><?=$row['text'];?></textarea>
                    </td>
                    <td width="10%">
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" id="" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td width="10%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>" id="">
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <input type="hidden" name="table" value="<?= $do;?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="cent">
            <?php if($n - 1 > 0):?>
                <a href="?do=news&p=<?=$n - 1;?>"> < </a>
                <?php endif;?>
            <?php for($i=1;$i<=$pages;$i++): $size = ($n==$i)?'24px':'';?>
            <a href="?do=news&p=<?=$i;?>" style="font-size: <?=$size;?>"><?=$i;?></a>
            <?php endfor;?>...
            <?php if($n + 1 <= $pages):?>
                <a href="?do=news&p=<?=$n + 1;?>"> > </a>
                <?php endif;?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?= $do;?>.php?table=<?= $do;?>')"
                            value="新增最新消息資料"></td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>