<?php
require('../../classes/defines.inc.php');


/* Création */
if (isset($_POST['send'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    $dateContact = date('Y-m-d H:i:s');
    $oContact->create($nom, $prenom, $mail, $sujet, $message, $dateContact);
    header("Location: ../../index.php");
}

/* Récupération des données */
$data = $oContact->findAll();

/* Suppression */
if (isset($_GET['DeleteById'])) {
    $oContact->deleteById($_GET['DeleteById']);
    header("Location: index.php");
}
