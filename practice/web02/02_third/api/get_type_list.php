<?php
include_once "db.php";

$news= $News->all(['type'=>$_GET['type']]);

foreach($news as $n):
?>
<div>
    <!-- 傳出去data-post 好可以拿到文章 -->
    <a class="post-item" href="#" data-post="<?=$n['id'];?>">
        <?=$n['title'];?>
    </a>
</div>
<?php endforeach;?>