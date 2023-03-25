<?php
include("../config.php");

if (isset($_POST["id"]) && isset($_POST["ID_Recurrence"])) {
    $db->deleteByIdRec('events', $_POST['ID_Recurrence']);
}
