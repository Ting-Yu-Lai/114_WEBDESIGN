<?php
// 資料夾層面問題
include "db.php";

foreach($_POST['id'] as $key => $id) {
    if(isset($_POST['del']) && in_array($id,$_POST['del'])) {
        $titles->del($id);
    }else{
        $row = $titles->find($id);
        $row['text']=$_POST['text'];
        $row['sh']=($_POST['sh']==$id)?1:0;
        $titles->save($row);

    }
    to("../back.php?do=title");
}