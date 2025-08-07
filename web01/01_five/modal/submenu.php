<?php include_once "../api/db.php";?>
<h3>編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method="post">
    <table class="cent add">
        <tr class="cent">
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php 
        $rows = $Menu->all(['main_id'=>$_GET['id']]);
        foreach($rows as $row):?>
        <tr class="cent">
            <td>
                <input type="text" name="text[]" id="text" value="<?=$row['text'];?>">
            </td>
            <td>
                <input type="text" name="href[]" id="text" value="<?=$row['href'];?>">
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
            </td>
        </tr>
        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
            <?php endforeach;?>
    </table>
    <div class="cent">
        <input type="hidden" name="main_id" value="<?=$_GET['id'];?>">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="修改確定"><input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>
<script>
    function more() {
        let tmp = 
        `
        <tr class="cent">
            <td>
                <input type="text" name="text2[]" id="text" value="">
            </td>
            <td>
                <input type="text" name="href2[]" id="text" value="">
            </td>
            <td>
                <input type="checkbox" name="del[]" value=""?>
            </td>
        </tr>
        `;
        $('.add').append(tmp);
    }
</script>