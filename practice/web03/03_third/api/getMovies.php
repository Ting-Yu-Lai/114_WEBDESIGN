<?php
include_once "db.php";

$id = $_GET['id'];

$today = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("-2 days",strtotime($today)));
$movies = $Vv->all(['sh'=>1]," and ondate between '$ondate' and '$today' order by `rank`");

foreach($movies as $row):
$selectId = ($id == $row['id'])?'selected':'';
?>
    <option value="<?=$row['id'];?>" <?=$selectId;?>>
        <?=$row['name'];?>
    </option>
<?php endforeach;?>