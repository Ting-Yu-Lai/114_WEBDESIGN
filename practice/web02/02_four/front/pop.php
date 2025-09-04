<style>
    .title {
        cursor: pointer;
        color: blue;
    }

    .title:hover {
        color: green;
        text-decoration: underline;
    }

    .pop {
        background: rgba(51, 51, 51, 0.8);
        color: #fff;
        min-height: 100px;
        width: 300px;
        position: fixed;
        display: none;
        z-index: 9999;
        overflow: auto;
    }
</style>
<fieldset>
    <legend>
        目前位置: 首頁 > 人氣文章
    </legend>
    <table style="margin: auto;width:95%">
        <tr style="text-align:center">
            <td width="20%">標題</td>
            <td style="width: 60%;">內容</td>
            <td></td>
        </tr>
        <?php
        $all = count($News->all());
        $div = 5;
        $page = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(" order by `good` desc limit $start, $div");
        foreach ($rows as $row):
        ?>
            <tr>
                <td class="title"><?= $row['title']; ?></td>
                <td>
                    <div class="short"><?= mb_substr($row['text'], 0, 30); ?></div>
                    <div class="all">
                    <div id="alerr" class="pop">
                        <h2 style="color: lightblue"><?php echo $Type[$row['type']];?></h2>
                        <pre id="ssaa">
                            <?php echo $row['text']; ?>
                        </pre>
                    </div>
                </td>
                <td>
                    <span><?=$row['good'];?></span>個人說
                    <img src="./icon/02B03.jpg" alt="" style="width: 18px;"> - 
                    <?php
                    if (isset($_SESSION['login'])):
                        $chk = $Log->count(['news' => $row['id'], 'user' => $_SESSION['login']]);
                    ?>
                        <a href="#" onclick="good(<?= $row['id']; ?>)"><?= ($chk) ? '收回讚' : '讚'; ?></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="ct">
        <?php if ($now - 1 > 0): ?>
            <a href="?do=pop&p=<?= $now - 1; ?>">
                < </a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $page; $i++): $size = ($now == $i) ? '24px' : ''; ?>
                    <a href="?do=pop&p=<?= $i; ?>" style="font-size: <?= $size; ?>;"> <?= $i; ?> </a>
                <?php endfor; ?>
                <?php if ($now + 1 <= $page): ?>
                    <a href="?do=pop&p=<?= $now + 1; ?>"> > </a>
                <?php endif; ?>
    </div>
</fieldset>
<script>
    $('.title').on("click", function() {
        $(this).next().find(".short,.all").toggle();
    })

    function good(news) {
        $.post("./api/good.php", {
            news
        }, function() {
            location.reload();
        })
    }
</script>