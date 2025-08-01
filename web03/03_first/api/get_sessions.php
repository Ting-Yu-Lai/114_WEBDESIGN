<?php
include_once 'db.php';
$id = $_GET['movieId'];
$date = $_GET['date'];
$today = strtotime(date("Y-m-d"));
// $ondate = date("Y-m-d", strtotime("-7 days",strtotime($today)));
$movies = $Movie->find($id);

$start = 0;
$hr = date("G");
if($date == date("Y-m-d") && $hr > 13) {
    // 拿到無條件進位的數字
    $start = ceil(($hr - 13)/2);
}


for($i = $start;$i<5;$i++) {
    $remaining = 20; //假設每場剩餘20個座位，20-已被訂走的座位數
    echo "<option value='{$sessStr[$i]}'>";
    echo $sessStr[$i];
    echo " 剩餘座位 ";
    echo "$remaining 人";
    echo "</option>";
}


?>