<?php 
include_once "db.php";

// 拿到的文章type是要可以後續列出文章的所以
$news =  $News->all(['type'=>$_GET['type']]);
foreach($news as $new):
?>
<div>
    <a href="#" class="postItem" data-post="<?=$new['id'];?>">
        <?=$new['title'];?>
    </a>
</div>
<?php endforeach;?>