<?php

try {
    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "equestreproject";

    // connect to DB
    $db = new PDO("mysql:host=$server;dbname=$dbname", "$username", "$password");
} catch (PDOException $e) {
    //throw $th;
}
require("personne.class.php");
require("cavalier.class.php");
require("cheval.class.php");
require("robe.class.php");
require("pension.class.php");
require("tarif.class.php");
require("inscription.class.php");
require("responsable.class.php");
require("typepension.class.php");
require("cours.class.php");
require("inscriptionCours.class.php");





$oCavalier = new Cavalier("", "", "", "", "", "", "", "", 0, "",);
$oCheval = new Cheval("", "", "", 0, 0);
$oRobe = new Robe(0, "");
$oPension = new Pension(0, 0, 0, "", "");
$oTarif = new Tarif("", 0);
$oInscription = new Inscription("", 0, 0, 0);
$oResponsable = new Responsable("", "", "", "", "", "", "", "", "", "");
$oTypePension = new TypePension("");
$oCours = new Cours(0, "", "", "", "", "", 0);
$oInscriptionCours = new InscriptionCours(0, 0, 0);
