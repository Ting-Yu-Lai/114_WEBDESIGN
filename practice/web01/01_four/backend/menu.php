<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">選單管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td width="10%"></td>
                </tr>
                <?php
                // 用all拿出所有的資料
                $rows = ${ucfirst($do)}->all(['main_id'=>0]);
                foreach ($rows as $row):
                ?>
                    <tr class="">
                        <td width="23%">
                            <input type="text" name="text[]" id="text" value="<?= $row['text']; ?>">
                        </td>
                        <td width="23%">
                            <input type="text" name="href[]" id="href" value="<?= $row['href']; ?>">
                        </td>
                        <td>
                            <?php
                            count($Menu->all(['main_id' => $row['id']]));
                            ?>
                        </td>
                        <td width="7%">
                            <input type="checkbox" name="sh[]" id="sh" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>>
                        </td>
                        <td width="7%">
                            <input type="checkbox" name="del[]" id="del" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button"
                                onclick="op('#cover','#cvr','./modal/submenu.php?id=<?= $row['id']; ?>&table=<?= $do; ?>')" value="編輯次選單">
                        </td>
                    </tr>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                <?php endforeach; ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="hidden" name="table" value="<?= $do; ?>">

                        <!-- 我要把table傳送到api讓他知道是哪個table -->
                        <input type="button"
                            onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增主選單">
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