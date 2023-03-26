<?php
require('../../classes/defines.inc.php');

$session = "";
if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../connexion/");
}

if (isset($_POST['update'])) {
    $cavUpdate = $oCavalier->updateById($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['naissance'], $_POST['mail'], $_POST['telephone'], $_FILES['photo'], $_POST['galop'], $_POST['licence']);
    $cavUser = $oCavalier->findById($_POST['id']);
    header("Location: index.php");
}
