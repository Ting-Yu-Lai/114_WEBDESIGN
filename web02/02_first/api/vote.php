<?php
include_once './db.php';

$option = $Que->find($_POST['option']);
// 拿到這個option裡面的subject_id的標題的id
$subject = $Que->find($option['subject_id']);
$option['vote']++;
//標題也要+1 代表總票數
$subjectp['vote']++;

$Que->save($option);
$Que->save($subject);

to("../index.php?do=result&id={$subject['id']}");