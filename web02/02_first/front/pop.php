<div class="nav" style="margin-bottom:20px"> 
    <!-- 我要根據點選的分類網址更新文字內容，所以我要賦予他一個id 或 class -->
    目前位置:首頁 > 人氣文章區
</div>

<table style="width:95%;margin:auto;">
    <tr class="ct">
        <td style="width:20%;">標題</td>
        <td style="width:60%;">內容</td>
        <td>人氣</td>
    </tr>
        <?php
    $total = $News->count();
    $div = 5;
    $pages = ceil($total/$div);
    $now = $_GET['p']??1;
    $start= ($now - 1)*$div;
    // 題目要求有由大到小排列!
    $rows = $News->all(" order by `good` desc limit $start,$div");
    foreach($rows as $idx => $row):
    ?>
    <tr>
        <td><?=$row['title'];?></td>
        <td>
        <div class="short"><?=mb_substr($row['text'], 0, 30);?>...</div>
        <div class="all"></div>
        </td>
        <td>
            <!-- 按讚功能 -->
        </td>
    </tr>
        <?php
    endforeach;
    ?>
</table>
<div class="ct">
<?php
        if($now-1>0):
        ?>
        <a href="?do=pop&p=<?=$now-1;?>" style="font-size: 18px;"> < </a>
        <?php endif;?>
        <?php
        for($i=1;$i<=$pages;$i++) {
            $size = ($i == $now)? '24px':'';
            ?>
            <a href="?do=pop&p=<?=$i?>"  style="font-size:<?=$size;?>"><?=$i;?></a>
            <?php
        }
?>
<?php
if($now+1<=$pages):
?>
<a href="?do=pop&p=<?=$now+1;?>" style="font-size: 18px;"> > </a>
<?php endif;?>
</div>
