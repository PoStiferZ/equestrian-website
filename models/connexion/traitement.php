<?php
require('../../classes/defines.inc.php');
if (isset($_POST['close'])) {
    header("Location: ../../index.php");
} else if (isset($_POST['email']) && isset($_POST['password'])) {
    $_SESSION['email'] =  strtolower(htmlspecialchars($_POST['email']));
    $password = htmlspecialchars($_POST['password']);

    $email = $_SESSION['email'];



    // Get all users
    $dataUsers = $oCavalier->findAll();
    $userConnexion = false;
    foreach ($dataUsers as $dataUser) {
        if ($dataUser['mail'] == $email && $dataUser['mdp'] == $password) {
            $userConnexion = true;
            // Start session
            session_start();
            $_SESSION['id'] = $dataUser['ID_Personne'];

            $_SESSION['nom'] = $dataUser['nom'];
            $_SESSION['prenom'] = $dataUser['prenom'];
            $_SESSION['naissance'] = $dataUser['dateNaissance'];

            $_SESSION['mail'] = $dataUser['mail'];
            $_SESSION['telephone'] = $dataUser['telephone'];

            $_SESSION['photo'] = $dataUser['photo'];

            $_SESSION['admin'] = $dataUser['admin'];
            var_dump($_SESSION['admin']);


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
