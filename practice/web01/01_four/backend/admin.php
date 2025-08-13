<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">帳號</td>
                    <td width="48%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                // 用all拿出所有的資料
                $rows = ${ucfirst($do)}->all();
                foreach ($rows as $row):
                ?>
                    <tr class="">

                        <td width="45%">
                            <input type="text" name="acc[]" id="acc" value="<?= $row['acc']; ?>">
                        </td>
                        <td width="45%">
                            <input type="text" name="pw[]" id="pw" value="<?= $row['pw']; ?>">
                        </td>
                        <td width="10%">
                            <input type="checkbox" name="del[]" id="del" value="<?= $row['id']; ?>">
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
                            onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增管理者帳號">
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