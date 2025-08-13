<?php
include_once 'db.php';

$id = $_GET['id'];
$date = $_GET['date'];
$today = strtotime(date("Y-m-d"));

$movie = $Movie->find($id);

$start = 0;
$hr = date("G");
if ($date ==  date("Y-m-d") && $hr > 13) {
    $start = ceil(($hr - 13) / 2);
    if ($start >= 5) {
        echo "<option>今日無可預約場次</option>";
    }
}
for ($i = $start; $i < 5; $i++) {
    echo "<option value='{$sessStr[$i]}'>";
    echo $sessStr[$i];
    echo "</option>";
}
