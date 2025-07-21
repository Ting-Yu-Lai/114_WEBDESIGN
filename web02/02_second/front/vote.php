        <?php
            $subject = $Que->find($_GET['id']);
            $options = $Que->all(['subject_id'=>$_GET['id']]);
        ?>
<fieldset>
    <legend>目前位置：首頁  >  問卷調查  ><?=$subject['text'];?></legend>
    <form action="./api/vote.php" method="post">
    <?php
    foreach($options as $idx => $option):
    ?>
    <div>
        <input type="radio" name="option" value="<?=$option['id'];?>">
        <?=$option['text'];?>
    </div>
    <?php endforeach;?>
    <div class="ct">
        <input type="submit" value="我要投票">
    </div>
</form>
</fieldset>
