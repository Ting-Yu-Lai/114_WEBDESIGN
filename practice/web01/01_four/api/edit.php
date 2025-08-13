<?php
include_once './db.php';


// 先處理傳過來的table
// 儲存成db
$table = $_POST['table'];
$db = ${ucfirst($table)};

dd($_POST);
// 假設前端表單送出這些資料：
// $_POST = [
//     'id' => [3, 5, 7],
//     'text' => ['aaa', 'bbb', 'ccc'],
//     'sh' => 5,
//     'table' => 'title'
// ];

// 你的 foreach：
// foreach($_POST['id'] as $key => $id) {
//     $row = $db->find($id);            // 找到 id=3,5,7
//     $row['text'] = $_POST['text'][$key];  // 依序對應 'aaa', 'bbb', 'ccc'
//     ...
// }
foreach ($_POST['id'] as $key => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $db->del($id);
    } else {
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
                $row['sh'] = isset($_POST['sh']) && in_array($id, $_POST['sh']);

                break;
            default:
                if (isset($row['text'])) {
                    $row['text'] = $_POST['text'][$key];
                } else {
                    $row['sh'] = isset($_POST['sh']) && in_array($id, $_POST['sh']);
                }
        }
        $db->save($row);
    }
}

to("../backend.php?do=$table");
