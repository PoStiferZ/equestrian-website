<?php
$alldata = $oCours->findById($_SESSION['id']);
$allDataInscriptionCours = $oInscriptionCours->findAll();


if (isset($_POST['beMissing'])) {
    $idPersonne = htmlspecialchars($_POST['idPersonne']);
    $idCours = htmlspecialchars($_POST['idCours']);
    $a = $oInscriptionCours->beMissing($idPersonne, $idCours);
}
var_dump($a);

if (isset($_POST['newInscriptionCours'])) {
    $idPersonne = htmlspecialchars($_POST['idPersonne']);
    $idCours = htmlspecialchars($_POST['idCours']);
    $oInscriptionCours->create($idPersonne, $idCours);
}
