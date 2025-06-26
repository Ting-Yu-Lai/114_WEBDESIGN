<?php
include "./db.php";

if(!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
    $row=$titles->find($_POST['id']);
    $row['img']=$_FILES['img']['name'];
    $row['text'] = $_POST['text']; 
    // var_dump($row);
    $tmp = $titles->save($row);
    // var_dump($tmp);
}

to("../back.php?do=title");