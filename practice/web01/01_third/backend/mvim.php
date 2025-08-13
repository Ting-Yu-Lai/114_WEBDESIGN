<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">動畫圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
            </tbody>
            <?php
            $rows = ${ucfirst($do)}->all();
            foreach ($rows as $row):
            ?>
                <tbody>
                    <tr>
                        <td width="80%">
                            <img src="./images/<?= $row['img']; ?>" style="width: 80px;height:64px;" alt="">
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="sh[]" id="" value="<?= $row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="del[]" id="" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" value="更新動畫圖片" onclick="op('#cover','#cvr','./modal/update.php?id=<?=  $row['id']; ?>&table=<?= $do; ?>')">
                        </td>
                    </tr>
                    <!-- 我們要把input id 傳送給edit去做資料表讀取匯入 -->
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                </tbody>
            <?php
                endforeach;
            ?>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <!-- 我們要把input table 傳送給edit去做ucfirst()資料表讀取匯入 -->

                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px">
                        <input type="button"
                            <?php
                            // op開啟的位置除了傳數值，還有需要傳入table讓modal的form可以POST table到api執行DB class
                            ?>
                            onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增動畫圖片">
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>