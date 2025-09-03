
<fieldset>
    <legend style="margin-bottom: 20px;">
        <div class="nav">
            目前位置: 首頁 > 問卷調查
        </div>
    </legend>
    <table style="width:95%;margin:auto">
        <tr class="ct">
            <td width="10%">編號</td>
            <td width="60%">問卷題目</td>
            <td width="10%">投票</td>
            <td width="10%">結果</td>
            <td width="10%">狀態</td>
        </tr>
        <?php
            $rows  = $Que->all(['subject_id'=>0]);
            foreach ($rows as $idx => $row):
        ?>
        <tr class="ct">
            <td><?=$idx + 1;?></td>
            <td><?php echo $row['text'];?></td>
            <td>
                <?= $row['vote'];?>
            </td>
            <td>
                <a href="?do=result&id=<?=$row['id'];?>">結果</a>
            </td>
            <td>
                <?php if(isset($_SESSION['login'])):?>
                    <a href="?do=vote&id=<?=$row['id'];?>">參與投票</a>
                <?php else:?>
                    <a href="?do=login">請先登入</a>
                <?php endif;?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</fieldset>