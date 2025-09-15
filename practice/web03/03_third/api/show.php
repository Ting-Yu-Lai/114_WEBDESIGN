<?php

include_once "db.php";

$vv = $Vv->find($_POST['id']);
$vv['sh'] = ($vv['sh'] == 1)?0:1;
$Vv->save($vv);
?>
 