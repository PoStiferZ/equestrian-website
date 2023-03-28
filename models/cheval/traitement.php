<?php
require('../../classes/defines.inc.php');

if (isset($_POST['close'])) {
    header("Location: index.php");
} else {
    $chevFind = $oCheval->findAll();

    if (isset($_POST['submit'])) {
        $chevCreate = $oCheval->create($_POST['nomC'], $_POST['dnaC'], $_FILES['photo'], $_POST['sir'], $_POST['idRobe']);
        header("Location: index.php");
    }

    if (isset($_GET['id'])) {
        $chevFindId = $oCheval->findById($_GET['id']);
    }

    if (isset($_POST['Update'])) {
        $chevUpdate = $oCheval->updateById($_POST['ID_Cheval'], $_POST['nomC'], $_POST['dnaC'], $_FILES['photo'], $_POST['sir'], $_POST['idRobe']);
        header("Location: index.php");
    }

    if (isset($_GET['DeleteById'])) {
        $chevDelete = $oCheval->deleteById($_GET['DeleteById']);
        header("Location: index.php");
    }

    if (isset($_POST['back'])) {
        header("Location: index.php");
    }
}
