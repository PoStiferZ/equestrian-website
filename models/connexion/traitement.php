<?php
require('../../classes/defines.inc.php');
if (isset($_POST['close'])) {
    header("Location: ../../index.php");
} else if (isset($_POST['email']) && isset($_POST['password'])) {
    $_SESSION['email'] =  strtolower(htmlspecialchars($_POST['email']));
    $password = $_POST['password'];

    $email = $_SESSION['email'];

    // Get all users
    $filter_galop = ["1", "2", "3", "4", "5", "6", "7"];
    $filter_major = null;
    $dataUsers = $oCavalier->findAll($filter_galop, $filter_major);
    $userConnexion = false;
    foreach ($dataUsers as $dataUser) {
        if ($dataUser['mail'] == $email && $dataUser['mdp'] == $password) {
            $userConnexion = true;
            // Start session
            session_start();
            $_SESSION['id'] = $dataUser['idPersonne'];

            $_SESSION['nom'] = $dataUser['nom'];
            $_SESSION['prenom'] = $dataUser['prenom'];
            $_SESSION['naissance'] = $dataUser['dateNaissance'];

            $_SESSION['mail'] = $dataUser['mail'];
            $_SESSION['telephone'] = $dataUser['telephone'];

            $_SESSION['photo'] = $dataUser['photo'];

            $_SESSION['admin'] = $dataUser['admin'];


            // If user is a rider
            if ($dataUser['numeroLicence'] != null && $dataUser['niveauGalop'] != null) {
                $_SESSION['licence'] = $dataUser['numeroLicence'];
                $_SESSION['galop'] = $dataUser['niveauGalop'];
                header("Location: ../account/index.php");
            }

            if ($dataUser['admin'] == 1) {
                header("Location: ../cavalier/index.php");
            }
        }
    }
    if ($userConnexion == false) {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
