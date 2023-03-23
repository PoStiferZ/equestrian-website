<?php
require('../../classes/defines.inc.php');
$inscriptionFind = $oInscription->findAll();

if (isset($_POST['submit'])) {
    $inscriptionCreate = $oInscription->create($_POST['an'], $_POST['cffe'], $_POST['cc'], $_POST['idPersonne']);
    header("Location: index.php");
}

if (isset($_GET['id'])) {
    $inscriptionFindId = $oInscription->findById($_GET['id']);
}

if (isset($_POST['Update'])) {
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
