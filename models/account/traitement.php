<?php
require('../../classes/defines.inc.php');
session_start();

if (isset($_POST['logout'])) {

    session_unset();
    session_destroy();
    header("Location: ../connexion/");
}
if (isset($_POST['update'])) {
    $cavUpdate = $oCavalier->updateById($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['naissance'], $_POST['mail'], $_POST['telephone'], $_FILES['photo'], $_POST['galop'], $_POST['licence']);

    $_SESSION['id'] = $_POST['id'];

    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['prenom'] = $_POST['prenom'];
    $_SESSION['naissance'] = $_POST['naissance'];

    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['telephone'] = $_POST['telephone'];

    $id = $_POST['id'];
    $request = "SELECT photo FROM personne WHERE ID_Personne =:id";
    $sql = $db->prepare($request);
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($sql as $photo) {

        $_SESSION['photo'] = $photo['photo'];
    }

    // If user is a rider
    $_SESSION['galop'] = $_POST['galop'];
    $_SESSION['licence'] = $_POST['licence'];

    header("Location: index.php");
}
