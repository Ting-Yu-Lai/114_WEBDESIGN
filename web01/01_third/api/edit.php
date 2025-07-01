<?php

include_once "./db.php";
// dd($_POST);
// dd($_FILES);

// 我把table傳進來 因為我要一次整併所有edit
$table = $_POST['table'];
$db = ${ucfirst($table)};

foreach ($_POST['id'] as $key => $id) {
    // 可是需要isset先判斷是否有del
    // in_array($id, $_POST['del']) 檢查當前遍歷的 $id 是否在 $_POST['del'] 陣列中。
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    } else {
        // 歷變所有table
        $row = $db->find($id);
        switch ($table) {
            case 'title':
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = ($_POST['sh'] == $id) ? 1 : 0;
                break;
            case 'admin':
                $row['acc'] = $_POST['acc'][$key];
                $row['pw'] = $_POST['pw'][$key];
                break;
            case 'menu':
                $row['text'] = $_POST['text'][$key];
                $row['href'] = $_POST['href'][$key];
                $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh'])) ? 1 : 0;
                break;
            default:
            if(isset($row['text'])) {
                $row['text'] = $_POST['text'][$key];
            }
            $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh'])) ? 1 : 0;

        }
        var_dump($row);
        $db->save($row);
    }
}

to("../backend.php?do=$table");
?>