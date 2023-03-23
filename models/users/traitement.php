<?php
require('../../classes/defines.inc.php');
$usersFind = $oUsers->findAll();

if (isset($_POST['submit'])) {
    $usersCreate = $oUsers->create($_POST['email'], $_POST['mdp'],$_POST['idPersonne']);
    header("Location: index.php");
}

if (isset($_GET['idConn'])) {
    $usersFindId = $oUsers->findById($_GET['idConn']);
}

/* if (isset($_POST['Update'])) {
    $inscriptionUpdate = $oInscription->updateById($_POST['idInscription'], $_POST['an'], $_POST['cffe'], $_POST['cc'], $_POST['idPersonne']);
    header("Location: index.php");
}

if (isset($_GET['DeleteById'])) {
    $inscriptionDelete = $oInscription->deleteById($_GET['DeleteById']);
    header("Location: index.php");
}

if (isset($_POST['back'])) {
    header("Location: index.php");
}
 */