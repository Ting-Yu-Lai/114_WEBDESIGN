<style>
    .line {
        height: 24px;
        background-color: #ccc;
    }
</style>
<?php
    $subject = $Que->find($_GET['id']);
    $options = $Que->all(['subject_id' => $_GET['id']]);
?>
<fieldset>
    <legend style="margin-bottom: 20px;">
        <div class="nav">
            目前位置: 首頁 > 問卷調查 > <?php echo $subject['text']; ?>
        </div>
    </legend>
    <h3><?php echo $subject['text']; ?></h3>
    <?php
        foreach ($options as $idx => $option):
            $total = ($subject['vote'] == 0) ? 1 : $subject['vote'];
            $rate  = $option['vote'] / $total;
        ?>
    <div style="margin: 10px 0;display:flex;align-items:center">
        <div style="width:50%;">
            <?php echo $option['text'];?>
        </div>
        <div style="width:50%;display:flex;align-items:center">
            <div class="line" style="width:<?=$rate*0.8*100;?>%;"></div>
            <div class="info">(<?= round($rate*100);?>%)</div>
        </div>
    </div>
    <?php endforeach; ?>
        <div class="ct">
            <button onclick="location.href='?do=que'">返回</button>
        </div>
</fieldset>