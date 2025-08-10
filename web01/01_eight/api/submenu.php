<?php

include_once "db.php";
$table = $_POST['table'];

$db = ${ucfirst($table)};
$main_id = $_POST['main_id'];


if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $db->del($id);
        } else {
            $row = $db->find($id);
            $row['text'] = $_POST['text'][$key];
            $row['href'] = $_POST['href'][$key];
            $db->save($row);
        }
    }
}


if(isset($_POST['text2'])) {
    foreach ($_POST['text2'] as $key => $text) {
        if ($text != "") {
            $href = $_POST['href2'][$key];
            $row = $db->save([
                'text' => $text,
                'href' => $href,
                'main_id' => $main_id,
                'sh' => 1,
            ]);
        }
    }
}

to("../back.php?do=$table");
