<?php include_once "../api/db.php" ;?>

<h3 class="cent">編輯次主選單</h3>
<form method="post" action="./api/submenu.php">
    <table width="100%">
        <tbody class="add">
            <tr class="yel">
                <td width="45%">次選單名稱</td>
                <td width="45%">次選單連結網址</td>
                <td width="10%">刪除</td>
            </tr>
            <?php
            // 用all拿出所有的資料
            $rows = $Menu->all(['main_id' => $_GET['id']]);
            foreach ($rows as $row):
            ?>
                <tr class="">
                    <td width="45%">
                        <input type="text" name="text[]" id="text" value="<?= $row['text']; ?>">
                    </td>
                    <td width="45%">
                        <input type="text" name="href[]" id="href" value="<?= $row['href']; ?>">
                    </td>
                    <td width="10%">
                        <input type="checkbox" name="del[]" id="del" value="<?= $row['id']; ?>">
                    </td>

                </tr>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="cent">
        <input type="hidden" name="main_id" value="<? $_GET['id']; ?>">
        <input type="hidden" name="table" value="<? $_GET['table']; ?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>
<script>
    function more() {
        let item = `<tr class="cent">
                    <td width="45%">
                        <input type="text" name="text2[]" id="text" value="">
                    </td>
                    <td width="45%">
                        <input type="text" name="href2[]" id="href" value="">
                    </td>
                    <td width="10%">
                      
                    </td>

                </tr>`

                $('.add').append(item);
    }
</script>