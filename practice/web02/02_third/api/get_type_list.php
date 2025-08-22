<?php
include_once "db.php";

$news= $News->all(['type'=>$_GET['type']]);

foreach($news as $n):
?>
<div>
    <a class="post-item" href="#" data-post="<?=$n['id'];?>">
        <?=$n['title'];?>
    </a>
</div>
<?php endforeach;?>