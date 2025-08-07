<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">校園映像資料圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td width="23%">操作</td>
                </tr>
                <?php
                $all = count(${ucfirst($do)}->all());
                $div = 3;
                $pages = ceil($all / $div);
                $n = $_GET['p']??1;
                $start = ($n - 1)*$div;
                $rows = ${ucfirst($do)}->all(" limit $start,$div");
                foreach($rows as $row):
                ?>
                <tr class="cent">
                    <td width="45%">
                        <img src="./image/<?=$row['img'];?>" alt="" style="width: 100px;height:68px">
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" id="" <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>" id="">
                    </td>
                    <td>
                        <input type="button" onclick="op('#cover','#cvr','./modal/update.php?id=<?=$row['id'];?>&table=<?= $do;?>')"
                            value="更新校園映像資料">
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <input type="hidden" name="table" value="<?= $do;?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="cent">
                    <?php if($n - 1 > 0):?>
                        <a href="./back.php?do=<?=$do;?>&p=<?=$n-1;?>"> < </a>
                    <?php endif;?>
                    <?php for($i=1;$i<=$pages;$i++): $size=($n == $i)?'24px':'';?>
                        <a href="./back.php?do=<?=$do;?>&p=<?=$i;?>" style="font-size: <?=$size;?>"><?=$i;?></a>
                    <?php endfor;?>
                    <?php if($n + 1 <= $pages):?>
                        <a href="./back.php?do=<?=$do;?>&p=<?=$n+1;?>"> > </a>
                    <?php endif;?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?= $do;?>.php?table=<?= $do;?>')"
                            value="新增校園映像資料圖片"></td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>