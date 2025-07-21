<?php
include_once 'db.php';
// 先去找出我投了哪個option
$option = $Que->find($_POST['option']);
// 再找出我投了哪個選項的標題
$subject = $Que->find($option['subject_id']);

$option['vote']++;
$subject['vote']++;
$Que->save($option);
$Que->save($subject);

to("../index.php?do=result&id={$subject['id']}");