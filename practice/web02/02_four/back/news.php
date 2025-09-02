<form action="./api/backPost.php" method="post">
        <table class="ct" style="width: 80%;margin:10px auto">
            <tr class="ct" >
                <td style="width: 10%;">編號</td>
                <td>標題</td>
                <td style="width: 10%;">顯示</td>
                <td style="width: 10%;">刪除</td>
            </tr>
            <?php
                $all   = $News->count();
                $div   = 3;
                $page  = ceil($all / $div);
                $now   = $_GET['p'] ?? '1';
                $start = ($now - 1) * $div;
                $news  = $News->all(" limit $start,$div");
            foreach ($news as $idx => $new): ?>
            <tr class="ct">
                <td style="width: 10%;background-color:#ccc"><?php echo $idx + 1;?>.</td>
                <td><?php echo $new['title'];?></td>
                <td style="width: 10%;"><input type="checkbox" name="sh[]" <?=($new['sh']==1)?'checked':'';?> value="<?php echo $new['id']; ?>" id=""></td>
                <td style="width: 10%;"><input type="checkbox" name="del[]" value="<?php echo $new['id']; ?>" id=""></td>
            </tr>
            <input type="hidden" name="id[]" value="<?=$new['id'];?>">
            <?php endforeach; ?>
        </table>
        <div class="ct">
            <?php if ($now - 1 > 0):?>
                <a href="?do=news&p=<?=$now - 1;?>"> < </a>
            <?php endif;?>
            <?php for($i = 1;$i <= $page;$i++): $size = ($now == $i)?'24px':'';?>
                <a href="?do=news&p=<?=$i;?>" style="font-size: <?=$size;?>"><?=$i;?></a>
            <?php endfor;?>
            <?php if ($now + 1 <= $page):?>
                <a href="?do=news&p=<?=$now + 1;?>"> > </a>
            <?php endif;?>
        </div>
        <div class="ct" style="margin-top: 20px;">
            <input type="submit" value="確定修改">
        </div>
    </form>