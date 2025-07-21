<style>
    .container {
        display: grid;
        grid-template-columns: 2fr 2fr 0.5fr;
        align-items: center;
        gap: 5px;
        width: 100%;
    }
</style>
<?php
$subject = $Que->find($_GET['id']);
$options = $Que->all(['subject_id' => $_GET['id']]);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 ><?= $subject['text']; ?></legend>
    <h2><?= $subject['text']; ?></h2>

    <?php
    foreach ($options as $idx => $option):
        $total = ($subject['vote'] == 0) ? 1 : $subject['vote'];
        $rate = $option['vote'] / $total;
    ?>
        <div class="container">
            <div><?= $option['text']; ?></div>
            <div style="width: <?= $rate * 100; ?>%;background-color:#ccc;height:24px"></div>
            <div><?= $option['vote']; ?>票(<?= round($rate * 100); ?>%)</div>
        </div>

    <?php endforeach; ?>
    <div class="ct">
        <button onclick="location.href='?do=que'">返回</button>
    </div>
</fieldset>