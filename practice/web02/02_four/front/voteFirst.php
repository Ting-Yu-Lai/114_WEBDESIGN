<?php
    $subject = $Que->find($_GET['id']);
    $options = $Que->all(['subject_id' => $_GET['id']]);
?>
<fieldset>
    <legend style="margin-bottom: 20px;">
        <div class="nav">
            目前位置: 首頁 > 問卷調查 > <?php echo $subject['text'];?>
        </div>
    </legend>
    <h3><?php echo $subject['text'];?></h3>
    <form action="./api/vote.php" method="post">
    <?php   
        foreach ($options as $idx => $option):
    ?>
    <div style="margin: 10px 0;">
        <input type="radio" name="option" value="<?=$option['id'];?>" id="">
        <?=$option['text'];?>
    </div>
    <?php endforeach; ?>
    <div class="ct">
        <input type="submit" value="我要投票">
    </div>
    </form>
    </table>
</fieldset>