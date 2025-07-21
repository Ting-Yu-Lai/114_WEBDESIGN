<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table >
        <tr class="ct">
            <th>編號</th>
            <th width="60%">問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>
        <!-- 拿出subject_id=0的標題 -->
        <?php
        $rows = $Que->all(['subject_id'=>0]);
        foreach ($rows as $key => $row):
        ?>
        <tr class="ct">
            <!-- key從0開始所以要+1 -->
            <td><?=$key+1;?></td>
            <td><?=$row['text'];?></td>
            <td><?=$row['vote'];?></td>
            <td>
                <!-- 結果要帶著id過去查看，去配對選項 -->
                <a href="?do=result&id=<?=$row['id'];?>">結果</a>
            </td>
            <td>
                <?php
                if(isset($_SESSION['login'])):
                ?>
                <!-- 參與投票要帶著id過去查看，去配對選項，然後記總票數 -->
                <a href="?do=vote&id=<?=$row['id'];?>">
                    參與投票
                </a>
                <?php else:?>
                <a href="?do=login">
                    請先登入
                </a>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach;?>
    </table>
</fieldset>