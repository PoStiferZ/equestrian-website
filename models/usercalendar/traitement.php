<?php
$alldata = $oCours->findAll();
$allDataInscriptionCours = $oInscriptionCours->findAll();

if (isset($_POST['newInscriptionCours'])) {
    $idPersonne = htmlspecialchars($_POST['idPersonne']);
    $idCours = htmlspecialchars($_POST['idCours']);
    $oInscriptionCours->create($idPersonne, $idCours);
}
