<?php
    $type = $_GET['type'] ?? 0;
    $nav  = '全部商品';

    if ($type != 0) {
        $row = $Type->find($type);
        if ($row['big_id'] == 0) {
            $nav   = $row['name'];
            $items = $Item->all(['big' => $type, 'sh' => 1]);
        } else {
            $big   = $Type->find($row['big_id']);
            $nav   = $big['name'] . " > " . $row['name'];
            $items = $Item->all(['mid' => $type, 'sh' => 1]);
        }

    } else {
        $items = $Item->all(['sh' => 1]);
    }

?>

<h2><?php echo $nav; ?></h2>

<?php
foreach ($items as $item): ?>
<div style="display: flex;width:65%;margin:auto;height:150px;">
    <div class="pp">
        <a href="?do=detail&id=<?=$item['id'];?>">
            <img src="./image/<?=$item['img'];?>" style="width: 150px;height:100px;" alt="">
        </a>
    </div>
    <div class="tt">
    <div class="pp">
        <table style="height:100%;">
            <tr class="tt ct">
                <td><?=$item['name'];?></td>
            </tr>
            <tr class="pp">
                <td>價錢:<?=$item['price'];?>
                <a href="?do=buycart&id=<?=$item['id'];?>">
                    <img src="./icon/0402.jpg" style="float: right;" alt=""> 
                </a>
            </td>
            </tr>
            <tr class="pp">
                <td>規格:<?=$item['spec'];?></td>
            </tr>
            <tr class="pp">
                <td>簡介:<?= mb_substr($item['intro'],0,20);?></td>
            </tr>
        </table>
    </div>
    </div>
</div>
<?php endforeach; ?>