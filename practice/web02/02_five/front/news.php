<style>
    .title {
        cursor: pointer;
        color: blue;
    }
    .title:hover {
        color: green;
    }
    .all {
        display: none;
    }
</style>
<fieldset>
    <legend>目前位置: 首頁 > 最新文章區</legend>
    <table style="width: 90%;margin:auto;text-align:center;">
        <tr>
            <td width="30%">標題</td>
            <td width="60%">內容</td>
            <td width="10%"></td>
        </tr>
        <?php
        $all = count($News->all());
        $div = 5;
        $page = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(" limit $start,$div");
        foreach ($rows as $idx => $row):
        ?>
            <tr>
                <td class="title"><?= $row['title']; ?></td>
                <td>
                    <div class="short"><?= mb_substr($row['text'], 0, 25); ?></div>
                    <div class="all" ><?= nl2br($row['text']);?></div>
                </td>
                <td>
                    <?php if(isset($_SESSION['login'])):
                    $chk = $Log->count(['news'=>$row['id'],'user'=>$_SESSION['login']]);
                    ?>
                        <a href="#" onclick="good(<?=$row['id'];?>)"><?=($chk)?'收回讚':'讚';?></a>
                    <?php endif;?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="ct">
        <?php if ($now - 1 > 0): ?>
            <a href="?do=news&p=<?= $now - 1; ?>">
                < </a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $page; $i++): $size = ($now == $i) ? '24px' : ''; ?>
                    <a href="?do=news&p=<?= $i; ?>" style="font-size:<?= $size; ?>"><?= $i; ?></a>
                <?php endfor; ?>
                <?php if ($now + 1 <= $page): ?>
                    <a href="?do=news&p=<?= $now + 1; ?>"> > </a>
                <?php endif; ?>
    </div>
</fieldset>
<script>
    $(".title").on("click",function(){
        $(this).next().find(".short,.all").toggle();
    })

    function good(id) {
        $.get("./api/good.php",{id},function(){
            location.reload();
        })
    }
</script>