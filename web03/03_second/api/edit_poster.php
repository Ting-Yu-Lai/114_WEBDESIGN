<?php
include_once 'db.php';
foreach($_POST['id'] as $idx => $id)
if(isset($_POST['del']) && in_array($id,$_POST['del'])) {
    $Poster->del($id);
}else {
    $poster = $Poster->find($id);
    $poster['name'] = $_POST['name'][$idx];
    $poster['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
    $poster['ani'] = $_POST['ani'][$idx];
    $Poster->save($poster);
}
if(!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],'../image/'.$_FILES['img']['name']);
    $Poster->save([
        'name' => $_POST['name'],
        'img' => $_FILES['img']['name'],
        'sh' => 1,
        'rank' => $Poster->max('id')+1,
        'ani' => rand(1,3),
    ]);
}

to('../back.php?do=poster');