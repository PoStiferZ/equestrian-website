<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$alldata = $oCours->findById($_SESSION['id'], $limit, $offset);
$pages = $oInscriptionCours->pagination($_SESSION['id']);

/* AFFICHAGE */
/* RECUPERER TOUTES LES COURS INSCRIS */
$allDataInscriptionCours = $oInscriptionCours->inscriptionSiNonInscrit($_SESSION['id']);

/* RECUPERER TOUTES LES COURS INSCRIS DE LA PERSONNE */
$inscriptionById = $oInscriptionCours->inscriptionById($_SESSION['id']);

/* ACTIONS */
/* MODIFICATION ABSENT */
if (isset($_POST['beMissing'])) {
    $idPersonne = $_POST['idPersonne'];
    $idCours = $_POST['idCours'];
    $page = $_POST['page'];
    if (!is_numeric($page)) {
        $page = 1;
    }
    $oInscriptionCours->beMissing($idPersonne, $idCours);
    header("Location: index.php?page=$page&limit=$limit");
}

/* MODIFICATION PRESENT */
if (isset($_POST['bePresent'])) {
    $idPersonne = $_POST['idPersonne'];
    $idCours = $_POST['idCours'];
    $page = $_POST['page'];
    if (!is_numeric($page)) {
        $page = 1;
    }
    $oInscriptionCours->bePresent($idPersonne, $idCours);
    header("Location: index.php?page=$page&limit=$limit");
}

/* AJOUT D INSCRIPTION */
if (isset($_POST['newInscriptionCours'])) {
    $idPersonne = $_POST['idPersonne'];
    $idCours = $_POST['idCours'];

    $oInscriptionCours->create($idPersonne, $idCours);
    header("Location: index.php");
}
/* SUPPRESSION D INSCRIPTION */
if (isset($_POST['deleteInscription'])) {
    $idPersonne = $_POST['idPersonne'];
    $idRecurrence = $_POST['idCours'];

    $oInscriptionCours->deleteInscription($idPersonne, $idRecurrence);
    header("Location: index.php");
}
