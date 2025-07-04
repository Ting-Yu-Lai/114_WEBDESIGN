<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料內容</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
            </tbody>
            <?php
            // 取得資料表的總比數
            $all = $News->count(${ucfirst($do)}->all());
            // 每頁顯示的比數
            $div = 3;
            // ceil()向上取整數，取得總頁數
            $pages = ceil($all / $div);
            // 取得目前頁數，預設為1
            $now = ($_GET['p'] ?? 1);
            //  用來計算 SQL 中 LIMIT 的「起始位置」
            $start = ($now -1) * $div;

            $rows = ${ucfirst($do)}->all(" LIMIT $start, $div");
            foreach ($rows as $row):
            ?>
                <tbody>
                    <tr>
                        <td width="80%">
                            <!-- textarea沒有value -->
                            <textarea name="text[]" id="text" style="width:90%;height:60px;"><?=$row['text'];?></textarea>
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="sh[]" id="" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>>
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
        <div class="cent">
            <?php
                if($now - 1 > 0):
            ?>
            <a href="?do=<?=$do;?>&p=<?=$do;?>"><</a>
            <?php endif; ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <!-- 我們要把input table 傳送給edit去做ucfirst()資料表讀取匯入 -->

                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px">
                        <input type="button"
                            <?php
                            // op開啟的位置除了傳數值，還有需要傳入table讓modal的form可以POST table到api執行DB class
                            ?>
                            onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增最新消息資料">
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