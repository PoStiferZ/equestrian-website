<?php
require('../../classes/defines.inc.php');

if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../connexion/");
}
