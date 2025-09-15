<?php 
include_once 'db.php';

$tab = $_POST['table'];
$r1 = $$tab->find($_POST['id1']);
$r2 = $$tab->find($_POST['id2']);

$tmp = $r1['rank'];
$r1['rank'] = $r2['rank'];
$r2['rank'] = $tmp;

$$tab->save($r1);
$$tab->save($r2);
?>