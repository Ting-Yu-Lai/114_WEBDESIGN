<?php
if(isset($_POST['id'])) {
    foreach($_POST['id'] as $id) {
        if(isset($_POST['del']) && in_array($id,$_POST['del'])) {
            $News->del($id);
        }else{
            $news = $News->find($id);
            $news['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']));
            $News->save($news);
        }
    }
}
?>
<h3>最新文章後台管理</h3>
<form action="?do=news" method="post">
<table>
    <tr>
        <td width=10% >編號</td>
        <td width=68% >標題</td>
        <td width=10% >顯示</td>
        <td width=10% >刪除</td>
    </tr>
    <?php 
    $all = count($News->all());
    $div = 3;
    $page = ceil($all / $div);
    $now = $_GET['p']??1;
    $start = ($now - 1)*$div;
    $rows = $News->all(" limit $start,$div");
    foreach($rows as $id => $row):
    ?>
    <tr>
        <td width=10% ><?=$id + $start+1;?></td>
        <td width=68% ><?=$row['title'];?></td>
        <td width=10% ><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh'] ==1)?'checked':'';?>></td>
        <td width=10% ><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
    </tr>
    <input type="hidden" name="id[]" value="<?=$row['id'];?>">
    <?php endforeach?>
</table>
<div class="ct">
    <?php
    if($now - 1 > 0):
    ?>
    <a href="?do=news&p=<?=$now-1;?>"> < </a>
    <?php endif; ?>
    <?php 
    for($i=1;$i<=$page;$i++):
        $size = ($now == $i)?"24px":'';
    ?>
    <a href="?do=news&p=<?=$i;?>" style="font-size: <?=$size;?>"><?=$i;?></a>
    <?php endfor; ?>
    <?php
    if($now + 1 <= $page):
    ?>
    <a href="?do=news&p=<?=$now+1;?>"> > </a>
    <?php endif; ?>
</div>
<input type="submit" value="確定修改">
</form>