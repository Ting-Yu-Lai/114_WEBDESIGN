<?php
include_once "db.php";

$rows = $News->all(['type'=>$_GET['type']]);
// dd($rows);
foreach($rows as $row):
    // dd($row);
?>
<div class="post-item" data-post="<?=$row['id'];?>"><?=$row['title'];?></div>
<?php endforeach;?>