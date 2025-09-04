<?php
include_once "db.php";

$news = $News->all(['type'=>$_GET['type']]);
foreach($news as $new):
?>
<div>
    <a href="#" class="postItem" data-post="<?=$new['id'];?>">
        <?=$new['title'];?>
    </a>
</div>
<?php endforeach;?>