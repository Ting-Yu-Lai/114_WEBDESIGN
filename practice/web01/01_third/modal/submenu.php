<?php include_once "../api/db.php"; ?>
<h3>編輯次選單</h3>

<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <div style="display: flex; margin:auto; width: 80%;" class="cent">
        <div class="" style="width:44%;margin:5px 0.5%;">次選單名稱</div>
        <div class="" style="width:44%;margin:5px 0.5%;">次選單連結網址</div>
        <div class="" style="width:10%;margin:5px 0.5%;">刪除</div>
    </div>
    <?php
    $rows = $Menu->all(['main_id' => $_GET['id']]);
    foreach ($rows as $row):
    ?>
        <div style="display: flex; margin:auto; width: 80%;" class="cent">
            <div class="" style="width:44%;margin:5px 0.5%;">
                <input type="text" name="text[]" id="" value="<?= $row['text']; ?>" style="width:90%">
            </div>
            <div class="" style="width:44%;margin:5px 0.5%;">
                <input type="text" name="href[]" id="" value="<?= $row['href']; ?>" style="width:90%">

            </div>
            <div class="" style="width:10%;margin:5px 0.5%;">
                <input type="checkbox" name="del[]" id="" value="<?= $row['id']; ?>">
            </div>
            <input type="hidden" name="id[]" value=<?= $row['id']; ?>>
        </div>
    <?php
    endforeach;
    ?>
    <div id="add"></div>
    <div class="cent">
        <!-- 傳送的main_id不應該是陣列 而是數值 -->
        <input type="hidden" name="main_id" value=<?= $_GET['id']; ?>>
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <button type="submit">修改確定</button>
        <button type="reset">重置</button>
        <input type="button" value="更多次選單" onclick="more()"></button>
    </div>
</form>

<script>
    function more() {
        let item = `
         <div style="display: flex; margin:auto; width: 80%;" class="cent">
        <div class="" style="width:44%;margin:5px 0.5%;">
            <input type="text" name="text2[]" id="" value="" style="width:90%">
        </div>
        <div class="" style="width:44%;margin:5px 0.5%;">
            <input type="text" name="href2[]" id="" value="" style="width:90%">
        </div>
        <div class="" style="width:10%;margin:5px 0.5%;">
        </div>
    </div>`

        $('#add').append(item);
    }
</script>