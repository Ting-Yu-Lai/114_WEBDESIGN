<?php
include_once 'db.php';
// print_r($_POST);
$movie = $Movie->find($_POST['id']);
$movie['sh'] = ($movie['sh']+1) % 2;
$Movie->save($movie);
?>