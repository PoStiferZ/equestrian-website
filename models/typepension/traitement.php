<?php
require('../../classes/defines.inc.php');
if (isset($_POST['close'])) {
    header("Location: index.php");
} else {
    /* Récupérer toute la table */
    $allData = $oTypePension->findAll();


    /* Fonction créer */
    if (isset($_POST['submit'])) {
        $create = $oTypePension->create($_POST['ltp']);
        header("Location: index.php");
    }

    /* Récupérer les informations en fonction de l'ID */
    if (isset($_GET['id'])) {
        $findID = $oTypePension->findById($_GET['id']);
    }

    /* Fonction modifier par ID */
    if (isset($_POST['Update'])) {
        $update = $oTypePension->updateById($_POST['id'], $_POST['ltp']);
        header("Location: index.php");
    }

    /* Fonction supprimer par ID */
    if (isset($_GET['DeleteById'])) {
        $robeDelete = $oTypePension->deleteById($_GET['DeleteById']);
        header("Location: index.php");
    }

    /* Simple retour */
    if (isset($_POST['back'])) {
        header("Location: index.php");
    }
}
