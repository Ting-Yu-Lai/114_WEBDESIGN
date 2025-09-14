<?php 

include_once "db.php";
if(isset($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],"../image/".$_FILES['img']['name']);
    $Rr->save([
        'name' => $_POST['name'],
        'img' => $_FILES['img']['name'],
        'rank' => $Rr->max('id')+1,
        'ani' => rand(1,3)
    ]);
}
to("../back.php?do=rr");