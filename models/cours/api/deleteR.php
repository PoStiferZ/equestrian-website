<?php
include("../config.php");

if (isset($_POST["id"]) && isset($_POST["idRecurrence"])) {
    $db->deleteByIdRec('events', $_POST['idRecurrence']);
}
