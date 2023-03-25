<?php
require('../../classes/defines.inc.php');
if (isset($_POST['close'])) {
    header("Location: ../../index.php");
} else if (isset($_POST['email']) && isset($_POST['password'])) {
    $_SESSION['email'] =  strtolower(htmlspecialchars($_POST['email']));
    $password = htmlspecialchars($_POST['password']);

    $email = $_SESSION['email'];


    // Get all users
    $dataUser = $oCavalier->findAll();

    if ($dataUser[0]['mail'] == $email && $dataUser[0]['mdp'] == $password) {
        session_start();
        $_SESSION['nom'] = $dataUser[0]['nom'];
        $_SESSION['prenom'] = $dataUser[0]['prenom'];
        $_SESSION['mail'] = $dataUser[0]['mail'];
        header("Location: ../account/index.php");
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
}
