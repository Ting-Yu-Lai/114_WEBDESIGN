<?php
$subject = $Que->find($_GET['id']);
// 拿取對應標題的選項
$options=$Que->all(['subject_id'=>$_GET['id']]);

?>
<style>
    .line {
        height:24px;
        background-color: #ccc;
    }
</style>
<fieldset>
    <legend>目前位置：首頁  > 問卷調查  > <?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>

    <?php
    foreach($options as $key => $option):
        // 拿出標題的票數 = 總票數的意思
        // 為了避免總票數是 0（會導致除以 0 錯誤），所以使用 ($subject['vote']==0)?1:...。
        // 如果為 0 就暫時設成 1，這樣 除法 不會報錯。
        $total = ($subject['vote']==0)?1:$subject['vote'];
        $rate = $option['vote']/$total;
    ?>
    <div style="margin: 10px 0;">
        <!-- 傳送標題的選項 -->
        <span style="width: 49%;display:inline-block;">
            <?=$option['text'];?>
        </span>
        <div style="width: 49%;display:inline-block;">
        <!-- 為什麼乘以 0.9？這是為了保留右邊資訊欄位空間，因為進度條只佔畫面大約 90% 的寬度，剩下 10% 留給票數與百分比顯示： -->
        <div class="line" style="width:<?=$rate*0.9*100;?>%"></div>
        <div class="info" style="width:20%;">

            <?=$option['vote'];?> 票(<?=round($rate*100,2);?>%)
        </div>
        </div>
    </div>
    <?php endforeach;?>
    <div class="ct">
        <button onclick="location.href='?do=que'">返回</button>
</div>

</fieldset>