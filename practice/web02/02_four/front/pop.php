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
    <legend style="margin-bottom: 20px;">
        <div class="nav">
            目前位置: 首頁 > 人氣文章區
        </div>
    </legend>
    <table style="width:95%;margin:auto">
        <tr class="ct">
            <td width="20%">標題</td>
            <td width="60%">內容</td>
            <td></td>
        </tr>
        <?php
            $all   = $News->count();
            $div   = 5;
            $page  = ceil($all / $div);
            $now   = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows  = $News->all("order by `good` desc limit $start,$div");
            foreach ($rows as $row):
        ?>
        <tr class="ct">
            <td width="20%" class="title"><?php echo $row['title']; ?></td>

            <td width="60%">
                <div class="short"><?=mb_substr($row['text'],0,25);?></div>
                <div class="all">
                    <div id="alerr" class="pop">
                        <h2 style="color: lightblue"><?php echo $Type[$row['type']];?></h2>
                        <pre id="ssaa">
                            <?php echo $row['text']; ?>
                        </pre>
                    </div>
                </div>
            </td>
            <td>
                <span><?=$row['good'];?></span>個人說
                <img src="./icon/02B03.jpg" alt="" style="width:18px;">
                <?php
                    if (isset($_SESSION['login'])):
                        $chk = $Log->count(['news' => $row['id'], 'user' => $_SESSION['login']]);
                    ?>
                <a href="#" onclick="good(<?php echo $row['id']; ?>)"><?php echo($chk) ? '收回讚' : '讚'; ?></a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="ct">
        <?php if ($now - 1 > 0): ?>
        <a href="?do=pop&p=<?php echo $now - 1; ?>">
            < </a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $page; $i++): $size = ($now == $i) ? '24px' : ''; ?>
                <a href="?do=pop&p=<?php echo $i; ?>" style="font-size:<?php echo $size; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
                <?php if ($now + 1 <= $page): ?>
                <a href="?do=pop&p=<?php echo $now + 1; ?>"> > </a>
                <?php endif; ?>
    </div>
</fieldset>
<script>
$(".title").hover(
    function(){
        $(this).next().find(".pop").show();
    },
    function(){
        $(this).next().find(".pop").hide();
    },
)
// news 是傳送該文章的id
function good(news) {
    // console.log(news);
    $.post("./api/good.php", {
        news
    }, function() {
        // console.log(res);
        location.reload();
    })
}
</script>