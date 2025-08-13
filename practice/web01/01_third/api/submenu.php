<?php
include_once "db.php";

$main_id = $_POST['main_id'];
foreach ($_POST['id'] as $key => $id) {
    // 可是需要isset先判斷是否有del
    // in_array($id, $_POST['del']) 檢查當前遍歷的 $id 是否在 $_POST['del'] 陣列中。
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $Menu->del($id);
    } else {
        // 歷變所有table
        $row = $Menu->find($id);
        $row['text'] = $_POST['text'][$key];
        $row['href'] = $_POST['href'][$key];
        $Menu->save($row);
    }
}

if (isset($_POST['text2'])) {
   foreach($_POST['text2'] as $key => $text) {
     if($text != '') {
        $href = $_POST['href2'][$key];
        $Menu->save(['text'=>$text,
                    'href'=>$href,
                    'main_id'=>$main_id,
                    'sh'=>1]);
     }
   }
}
to("../backend.php?do=menu");
