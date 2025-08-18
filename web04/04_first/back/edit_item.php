<h2 class="ct"></h2>
<?php
$item = $Item->find($_GET['id']);
?>
<form action="./api/save_item.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp">
                <?=$item['no'];?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?=$item['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" id="price" value="<?=$item['price'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="spec" id="spec" <?=$item['spec'];?>></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" id="stock" <?=$item['stock'];?>></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="img" value="<?=$item['no'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp"><textarea name="intro" id="intro" style="width: 75%;height:150px"><?=$item['intro'];?></textarea></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"><button
            onclick="location.href='?do=th'">取消</button></div>
</form>
<script>
    getBigs();
function getBigs() {
    $.get("./api/get_bigs.php", (bigs) => {
        $("#mid").html(options);
        <?php if(isset($_GET['id'])):?>;
         $('#big option[value={<?=$item['big'];?>}]').prop('selected',true);
        <?php endif;?>;
        getMids();
    })
}

function getMids() {
    let bigId = $("#big").val();
    $.get("./api/get_bigs.php", {bigId},(bigs) => {
        $("#big").html(options);
    })
}

$("#big").on("change",()=>{
    getMids();
})


</script>