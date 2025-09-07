<?php

include_once "db.php";

foreach ($_POST['del'] as $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $User->del($id);
    }
}

to("../back.php?do=login");

?>
