<div style="
              width: 99%;
              height: 87%;
              margin: auto;
              overflow: auto;
              border: #666 1px solid;
            ">
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
                $all =count(${ucfirst($do)}->all());
                $div = 3;
                $page = ceil($all / $div);
                $now = $_GET['p']??1;
                $start = ($now - 1)*$div;
                $row = $db->all(" limit $start,$div");
                foreach($row as $r):?>
                <tr class="">
                    <td width="45%">
                        <img src="./image/<?=$r['img'];?>" style="width: 100px;height:68px;" alt="">
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="sh[]" id="" value="<?=$r['id'];?>" <?=($r['sh']==1)?'checked':'';?>>
                    </td>
                    <td width="7%"><input type="checkbox" name="del[]" value="<?=$r['id'];?>" id=""></td>
                    <td>
                        <input type="button" onclick="op('#cover','#cvr','./modal/update.php?table=<?=$do;?>&id=<?=$r['id'];?>')" value="更新圖片" />
                    </td>
                </tr>
                <input type="hidden" name="table" value="<?=$do;?>">
                <input type="hidden" name="id[]" value="<?=$r['id'];?>">
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="cent">
            <?php if($now - 1 > 0):?>
                <a href="?do=image&p=<?=$now - 1;?>"> < </a>
                <?php endif;?>
                <?php for($i=1;$i<=$page;$i++): $size = ($now == $i)?'24px':'';?>
                <a href="?do=image&p=<?=$i;?>" style="font-size: <?=$size;?>;"> <?=$i;?> </a>
                <?php endfor;?>
            <?php if($now + 1 <= $page):?>
                <a href="?do=image&p=<?=$now + 1;?>"> > </a>
                <?php endif;?>
        </div>
        <table style="margin-top: 40px; width: 70%">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增校園映像資料圖片" />
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定" /><input type="reset" value="重置" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>