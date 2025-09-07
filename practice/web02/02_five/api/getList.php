<?php 

include_once "db.php";

$rows = $News->all(['type'=>$_GET['type']]);

foreach($rows as $row):?>
<div>
    <a class="postItem" data-post="<?=$row['id'];?>" href="#"><?=$row['title'];?></a>
</div>
<?php endforeach;?>