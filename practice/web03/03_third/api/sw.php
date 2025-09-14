<?php 
include_once 'db.php';

// dd($_POST);
$tab = $_POST['table'];
// echo $tab;
$r1 = $$tab->find($_POST['id1']);
// dd($r1);
$r2 = $$tab->find($_POST['id2']);
// dd($r2);

$tmp = $r1['rank'];
$r1['rank'] = $r2['rank'];
$r2['rank'] = $tmp;

$$tab->save($r1);
$$tab->save($r2);

?>