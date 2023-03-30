<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$alldata = $oCours->findById($_SESSION['id'], $limit, $offset);
$pages = $oInscriptionCours->pagination($_SESSION['id']);



$allDataInscriptionCours = $oInscriptionCours->findAll();


if (isset($_POST['beMissing'])) {
    $idPersonne = htmlspecialchars($_POST['idPersonne']);
    $idCours = htmlspecialchars($_POST['idCours']);
    $page = htmlspecialchars($_POST['page']);
    $oInscriptionCours->beMissing($idPersonne, $idCours);
    header("Location: index.php?page=$page&limit=$limit");
}

if (isset($_POST['bePresent'])) {
    $idPersonne = htmlspecialchars($_POST['idPersonne']);
    $idCours = htmlspecialchars($_POST['idCours']);
    $page = htmlspecialchars($_POST['page']);
    $oInscriptionCours->bePresent($idPersonne, $idCours);
    header("Location: index.php?page=$page&limit=$limit");
}


if (isset($_POST['newInscriptionCours'])) {
    $idPersonne = htmlspecialchars($_POST['idPersonne']);
    $idCours = htmlspecialchars($_POST['idCours']);
    $oInscriptionCours->create($idPersonne, $idCours);
    header("Location: index.php");
}
