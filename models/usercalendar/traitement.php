<?php
$alldata = $oCours->findById($_SESSION['id']);
$allDataInscriptionCours = $oInscriptionCours->findAll();


if (isset($_POST['beMissing'])) {
    $idPersonne = htmlspecialchars($_POST['idPersonne']);
    $idCours = htmlspecialchars($_POST['idCours']);
    $oInscriptionCours->beMissing($idPersonne, $idCours);
    header("Location: index.php");
}

if (isset($_POST['bePresent'])) {
    $idPersonne = htmlspecialchars($_POST['idPersonne']);
    $idCours = htmlspecialchars($_POST['idCours']);
    $oInscriptionCours->bePresent($idPersonne, $idCours);
    header("Location: index.php");
}


if (isset($_POST['newInscriptionCours'])) {
    $idPersonne = htmlspecialchars($_POST['idPersonne']);
    $idCours = htmlspecialchars($_POST['idCours']);
    $oInscriptionCours->create($idPersonne, $idCours);
    header("Location: index.php");
}
