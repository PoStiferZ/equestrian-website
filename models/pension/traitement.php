<?php
require('../../classes/defines.inc.php');

if (isset($_POST['close'])) {
    header("Location: index.php");
} else {

    $pensionFind = $oPension->findAll();

    if (isset($_POST['submit'])) {
        $pensionCreate = $oPension->create($_POST['idTP'], $_POST['idTar'], $_POST['idChev'], $_POST['dD'], $_POST['dF']);
        $pensID = $oPension->lastIdCreate();
        foreach ($pensID as $value) {
            $LastID =  $value['LAST_INSERT_ID()'];
        }
        $signeCreate = $oPension->createSigne($_POST['idCavalier'], $LastID);

        header("Location: index.php");
    }

    if (isset($_GET['id'])) {
        $pensionFindId = $oPension->findById($_GET['id']);
    }

    if (isset($_POST['Update'])) {
        $pensionUpdate = $oPension->updateById($_POST['idPens'], $_POST['idTP'], $_POST['idTar'], $_POST['idChev'], $_POST['dD'], $_POST['dF']);
        $pensionUpdate2 = $oPension->updateSigne($_POST['idCavalier'], $_POST['idPens']);
        header("Location: index.php");
    }

    if (isset($_GET['DeleteById'])) {
        $pensionDelete = $oPension->deleteById($_GET['DeleteById']);
        header("Location: index.php");
    }

    if (isset($_POST['back'])) {
        header("Location: index.php");
    }

    // Définition de l'en-tête SSE

    header('Cache-Control: no-cache');


    $stmt = $db->query("SELECT * FROM personne");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $cavaliers = [];

    foreach ($data as $personne) {
        $value = $personne['nom'] . ' ' . $personne['prenom'];
        $cavaliers[] = [
            'value' => $value,
            'id' => $personne['idPersonne']
        ];
    }

    file_put_contents('personnes.json', json_encode($cavaliers));
}
