<?php
include_once 'db.php';

$id = $_GET['id'];

$movie = $Movie->find($id);
$ondate = strtotime($movie['ondate']);
$today = strtotime(date("Y-m-d"));

for ($i = 0; $i < 3; $i++) {
    $date = strtotime("+$i days", $ondate);
    // 如果上映日期後三天 大於今天 才顯示
    if ($date >= $today) {
        $pass = date("Y-m-d", $date);
        echo "<option value='$pass'>$pass</option>";
    }
}

?>