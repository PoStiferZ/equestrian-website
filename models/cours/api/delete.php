<?php
include("../config.php");

if (isset($_POST["id"])) {
    $db->deleteById('events', $_POST['id']);
}


if (isset($_POST["ID_Recurrence"])) {
    $db->deleteByIdRec('events', $_POST['ID_Recurrence']);
}
