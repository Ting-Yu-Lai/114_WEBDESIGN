<style>
    .title {
        cursor: pointer;
        color: blue;
    }

    .title:hover {
        text-decoration: underline;
        color: green;
    }

    .pop {
        background: rgba(51, 51, 51, 0.8);
        color: #FFF;
        min-height: 100px;
        width: 500px;
        position: fixed;
        display: none;
        z-index: 9999;
        overflow: auto;
    }
</style>

<fieldset>
    <legend>目前位置:首頁 > 人氣文章區</legend>
    <table>
        <tr class="ct">
            <td width="20%">標題</td>
            <td width="60%">內容</td>
            <td>人氣</td>
        </tr>
        <?php
        $all = count($News->all());
        $div = 4;
        $page = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(" order by `good` desc limit $start,$div");
        foreach ($rows as $id => $row):
        ?>
            <tr class="ct">
                <td class="title"><?= $row['title']; ?></td>
                <td >
                    <div class="short">
                        <?= mb_substr($row['text'], 0, 30); ?>...
                    </div>
                    <div class="all">
                        <div id="alerr" class="pop">
                            <h3>
                                <?= $Type[$row['type']]; ?>
                            </h3>
                            <pre id="ssaa"><?= $row['text']; ?></pre>
    
                        </div>
                    </div>
                </td>
                <td>
                    <span><?=$row['good'];?></span>個人說
                    <img src="./icon/02B03.jpg" style="width: 18px;" alt="">
                    <?php
                    if(isset($_SESSION['login'])):
                        $chk = $Log->count(['news'=>$row['id'],'user'=>$_SESSION['login']]);
                    ?>
                    <a href="#" onclick="good(<?=$row['id'];?>)"><?=($chk)?'-收回讚':'-讚';?></a>
                    <?php endif;?> 
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div>
        <?php
        if ($now - 1 > 0):
        ?>
            <a href="?do=news&p=<?= $now - 1; ?>">
                < </a>
                <?php endif; ?>
                <?php
                for ($i = 1; $i <= $page; $i++):
                    $size = ($now == $i) ? "24px" : '';
                ?>
                    <a href="?do=news&p=<?= $i; ?>" style="font-size: <?= $size; ?>"><?= $i; ?></a>
                <?php endfor; ?>
                <?php
                if ($now + 1 <= $page):
                ?>
                    <a href="?do=news&p=<?= $now + 1; ?>"> > </a>
                <?php endif; ?>
    </div>
</fieldset>
<script>
    $('.title').hover(function() {
            $(this).next().find(".pop").show();
            console.log($(this).next().find(".pop"));
        },
        function() {
            $(this).next().find(".pop").hide();
        }
    )
    
    function good(news) {
        $.post("./api/good.php",{news},function(){
            location.reload();
        })
    }
</script>