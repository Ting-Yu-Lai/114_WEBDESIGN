<?php
include_once "./db.php";

dd($_POST);
$table = $_POST['table'];
$db = ${ucfirst($table)};

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
                $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
            default:
                if (isset($row['text'])) {
                    $row['text'] = $_POST['text'][$key];
                }
                $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;

                break;
        }
        // dd($row);
        // unset($_POST['table']);
        $db->save($row);
    }
}


to("../backend.php?do=$table");
?>
