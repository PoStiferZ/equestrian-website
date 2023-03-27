<?php
require('../../classes/defines.inc.php');
if (isset($_POST['close'])) {
    header("Location: index.php");
} else {
    $cavFind = $oCavalier->findAll();

    $pensionFind = $oPension->findAll();

    if (isset($_POST['submit'])) {
        if (isset($_POST['nomResp'])) {
            $respCreate = $oResponsable->create(htmlspecialchars($_POST['nomResp']), htmlspecialchars($_POST['prenomResp']), htmlspecialchars($_POST['dnaResp']), htmlspecialchars($_POST['mailResp']), htmlspecialchars($_POST['telResp']), htmlspecialchars($_POST['rue']), htmlspecialchars($_POST['cp']), $_POST['ville']);
            var_dump($_POST);

            $respID = $oResponsable->lastIdCreate();
            foreach ($respID as $value) {
                $LastID =  $value['LAST_INSERT_ID()'];
            }
        }
        $cavCreate = $oCavalier->create($_POST['nom'], $_POST['prenom'], $_POST['dna'], $_POST['mail'], $_POST['telephone'], $_FILES['photo'], $_POST['nvGalop'], $_POST['licence'], $LastID);
        header("Location: index.php");
    }
    if (isset($_GET['id'])) {
        $cavFindId = $oCavalier->findById($_GET['id']);
        $dataPension = $oPension->findByIDPersonne($_GET['id']);
    }

    if (isset($_POST['Update'])) {
        $cavUpdate = $oCavalier->updateById($_POST['ID_Personne'], $_POST['nom'], $_POST['prenom'], $_POST['dna'], $_POST['mail'], $_POST['telephone'], $_FILES['photo'], $_POST['nvGalop'], $_POST['licence']);

        header("Location: index.php");
    }


    if (isset($_GET['DeleteById'])) {
        $cavDelete = $oCavalier->deleteById($_GET['DeleteById']);
        header("Location: index.php");
    }
}
