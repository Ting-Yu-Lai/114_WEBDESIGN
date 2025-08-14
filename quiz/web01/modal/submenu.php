<?php include_once "../api/db.php";?>
<h3 class="t cent botli">編輯次選單</h3>
<form method="post" action="./api/submenu.php">
    <table width="100%">
        <tbody class="tb">
            <tr class="yel">
                <td width="30%">次選單</td>
                <td width="30%">次選單連結網址</td>
                <td width="7%">刪除</td>
            </tr>
            <?php
            $rows = $Menu->all(['main_id' => $_GET['id']]);
            foreach ($rows as $row): ?>
                <tr class="cent mytr">
                    <td width="45%">
                        <input type="text" name="text[]" value="<?= $row['text']; ?>" id="">
                    </td>
                    <td width="23%">
                        <input type="text" name="href[]" value="<?= $row['href']; ?>" id="">
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            <?php endforeach; ?>
        </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td class="cent">
                        <input type="hidden" name="main_id" value="<?=$_GET['id'];?>">
                        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                        <button type="button" onclick="more()">更多次選單</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

<script>
    function more() {
        let tmp = `
        <tr class="cent">
                        <td width="45%">
                            <input type="text" name="text2[]"  value="" id="">
                        </td>
                        <td width="23%">
                            <input type="text" name="href2[]" value="" id="">
                        </td>
                        <td></td>
                    </tr>
        `;
        $(".tb").append(tmp);
    }
</script>