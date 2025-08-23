<style>
    .title {
        cursor: pointer;
        color: blue;
    }

    .title:hover {
        text-decoration: underline;
        color: green;
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
        $div = 3;
        $page = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(" order by `good` desc limit $start,$div");
        foreach ($rows as $id => $row):
        ?>
            <tr class="ct">
                <td class="title"><?= $row['title']; ?></td>
                <td width="60%">內容</td>
                <td>人氣</td>
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