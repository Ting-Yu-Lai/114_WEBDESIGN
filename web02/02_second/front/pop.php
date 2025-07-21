<style>
.pop {
    background: rgba(51, 51, 51, 0.8);
    color: #FFF;
    height: 400px;
    width: 500px;
    position: fixed;
    display: none;
    z-index: 9999;
    overflow: auto;
}
</style>
<fieldset>
    <legend>目前位置：首頁 > 人氣 文章區</legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td>人氣</td>
        </tr>
        <?php
            $all = $News->count();
            $div = 5;
            $pages = ceil($all/ $div);
            $now = $_GET['p']??1;
            $start = ($now-1)*$div;
            $rows = $News->all(" limit $start,$div");
            foreach($rows as $idx => $row):
        ?>
        <tr>
            <td class="title" style="width: 55%;"><?=$row['title'];?></td>
            <td style="width: 20%;">
                <div class="short"><?= mb_substr($row['text'], 0,10);?>...</div>
                <div class="all">
                    <!-- 在index前面有這個寫好的功能 -->
                    <div id="alerr" class="pop">
                        <h2><?=$row['title'];?></h2>
                        <pre id="ssaa">
                            <?=$row['text'];?>
                        </pre>
                    </div>
                </div>
                <div class="all" style="display: none;"><?=nl2br($row['text']);?></div>
            </td>
            <td>
                <span><?=$row['good'];?></span>幾個人說
                <img src="./icon/02B03.jpg" style="width: 18px;">
                <?php
                if(isset($_SESSION['login'])):
                // 我要用log去記錄誰對哪篇文章按讚
                    $chk = $Log->count(['news'=>$row['id'],'user'=>$_SESSION['login']]);
                ?>
                <a href="#" onclick="good(<?=$row['id'];?>)"><?=($chk)?'-收回讚':'-讚';?>
                </a>
                <?php endif;?>
            </td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
    <?php
    if($now - 1 > 0):
    ?>
    <a href="?do=news&p=<?= $now-1;?>">
        < </a>
            <?php endif;?>

            <?php
    for($i=1;$i<=$pages;$i++):
    $size = ($now==$i)?'24px':'';
    ?>
            <a href="?do=news&p=<?= $i;?>" style="font-size: <?=$size;?>;"><?= $i;?></a>
            <?php
    endfor;
    ?>
            <?php
    if($now + 1 <= $pages):
    ?>
            <a href="?do=news&p=<?= $now+1;?>"> > </a>
            <?php endif;?>
</fieldset>
<script>
$('.title').hover(function() {
    console.log('Hover on title:', $(this).text());
    $(this).next().find('.pop').toggle();
})


function good(news) {
    $.post("./api/good.php", {
        news
    }, function() {
        location.reload();
    })
}
</script>