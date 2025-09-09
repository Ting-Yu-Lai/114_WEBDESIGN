<?php
include_once "db.php";

$Que->save(['text'=>$_POST['text'],'subject_id'=>0,'vote'=>0]);
if(isset($_POST['option'])) {
    $subject_id = $Que->find(['text'=>$_POST['text']])['id'];
    foreach($_POST['option'] as $option) {
        $Que->save(['text'=>$option,'subject_id'=>$subject_id,'vote'=>0]);
    }
}
to("../back.php?do=que");
?>