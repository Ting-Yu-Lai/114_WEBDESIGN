<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table style="width: 95%;margin:auto;">
        <tr>
            <td>編號</td>
            <td width="60%">問卷題目</td>
            <td>投票總數</td>
            <td>結果</td>
            <td>狀態</td>
        </tr>
        <?php
        $rows = $Que->all(['subject_id'=>0]);
        foreach($rows as $key => $row):
        ?>
        <tr>
            <td><?=$key+1;?></td>
            <td><?=$row['text'];?></td>
            <td><?=$row['vote'];?></td>
            <td>
                <a href="?do=result&id=<?=$row['id'];?>">結果</a>
            </td>
            <td>
                <?php
                if(isset($_SESSION['login'])):    
                ?>
                <a href="?do=vote&id=<?=$row['id'];?>">參與投票</a>
                <?php else:?>
                請先登入
                <?php endif;?>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
</fieldset>