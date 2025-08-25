<?php 
$type=$_GET['type']??0;
$nav = "全部商品";

if($type != 0) {
    // type不是0就把資料都撈出來
    $row=$Type->find($type);
    if($row['big_id']==0){
        $nav=$row['name'];
        $items=$Item->all(['big'=>$type,'sh'=>1]);
    }else{
        $big = $Type->find($row['big_id']);
        $nav=$big['name'] . " > ".$row['name'];
        $items=$Item->all(['mid'=>$type,'sh'=>1]);
    }  
}else{
    $items = $Item->all(['sh'=>1]);
}
?>
<h2><?=$nav;?></h2>
<?php foreach($items as $item):?>
    <?=$item['name'];?>
    <?php endforeach;?>

