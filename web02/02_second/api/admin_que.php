<!-- 因為是主題 所以subject_id設為0  -->
 <?php
 include_once "db.php";
dd($_POST);

 if(isset($_POST['subject'])) {
    $Que->save(['text'=>$_POST['subject'], 'subject_id'=>0, 'vote'=>0]);
    // 我要尋找text跟主題配對的那個id，讓我可以知道這是哪一個主題的選項
    $subject_id = $Que->find(['text'=>$_POST['subject']])['id'];

    foreach($_POST['option'] as $option) {
        // 先判斷是不是為空
        if(!empty($option)) {
            $Que->save(['text'=>$option, 'subject_id'=>$subject_id, 'vote'=>0]);
        }
    }
 }
 to("../back.php?do=que");