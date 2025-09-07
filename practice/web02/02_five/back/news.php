<form action="./api/backNews.php" method="post">
    <table style="width: 90%;margin:auto;text-align:center;">
        <tr>
            <td width="10%">編號</td>
            <td>標題</td>
            <td width="10%">顯示</td>
            <td width="10%">刪除</td>
        </tr>
        <?php
        $all = count($News->all());
        $div = 3;
        $page = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(" limit $start,$div");
        foreach ($rows as $idx => $row):
        ?>
            <tr>
                <td style="background-color: #ddd;"><?= ($start + $idx) + 1; ?>.</td>
                <td><?= $row['title']; ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
            </tr>
            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
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
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
</form>