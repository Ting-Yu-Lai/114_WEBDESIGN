<?php
include_once "db.php";

if(isset($_POST['text'])) {
    // 直接存取表單，subject_id是
    $Que->save(['text'=>$_POST['text'],'subject_id'=>0,'vote'=>0]);
    $subject_id = $Que->find(['text'=>$_POST['text']])['id'];

    foreach($_POST['option'] as $option) {
        if(!empty($option)) {
            $Que->save(['text'=>$option,'subject_id'=>$subject_id,'vote'=>0]);
        }
    }
}

to(
    "../back.php?do=que"
);