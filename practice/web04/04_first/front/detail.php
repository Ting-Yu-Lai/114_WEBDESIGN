<?php
$item = $Item->find($_GET['id']);
?>
<h2 class="ct"><?=$item['name'];?></h2>
<div style="display: flex;width:65%;margin:auto;height:150px;">
    <div class="pp">
        <a href="?do=detail&id=<?=$item['id'];?>">
            <img src="./image/<?=$item['img'];?>" style="width: 150px;height:100px;" alt="">
        </a>
    </div>
    <div class="tt">
        <div class="pp">
            <table style="height:100%;">
                <tr class="pp">
                    <td>分類:<?=$item['name'];?></td>
                </tr>
                </tr>
                <td>編號:<?=$item['no'];?></td>
                <tr class="pp">
                <tr class="pp">
                    <td>價錢:<?=$item['price'];?>
                    </td>
                </tr>
                <tr class="pp">
                    <td>詳細說明:<?= $item['intro'];?></td>
                </tr>
                <tr class="pp">
                    <td>庫存:<?= $item['stock'];?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="tt ct" style="width: 80%;margin:auto;">
    購買數量:
    <input type="number"  value="1" name="qt" id="">
    <a href="?do=buycart&id=<?=$item['id'];?>">
        <img src="./icon/0402.jpg" alt="">
    </a>
</div>