<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="40%">帳號</td>
                    <td width="40%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
            </tbody>
            <?php
            $rows = ${ucfirst($do)}->all();
            foreach ($rows as $row):
            ?>
            <tbody>
                <tr>
                    <td width="40">
                        <input type="text" name="acc[]" id="" value="<?= $row['acc']; ?>">
                    </td>
                    <td width="40%">
                        <input type="password" name="pw[]" id="" value="<?= $row['pw']; ?>">
                    </td>
                    <td width="10%">
                        <input type="checkbox" name="del[]" id="" value="<?= $row['id']; ?>">
                    </td>
                </tr>
                <!-- 我們要把input id 傳送給edit去做資料表讀取匯入 -->
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </tbody>
            <?php
            endforeach;
            ?>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <!-- 我們要把input table 傳送給edit去做ucfirst()資料表讀取匯入 -->

                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px">
                        <input type="button" <?php
                            // op開啟的位置除了傳數值，還有需要傳入table讓modal的form可以POST table到api執行DB class
                            ?> onclick="op('#cover','#cvr','./modal/<?= $do;?>.php?table=<?= $do;?>')" value="新增管理者帳號">
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