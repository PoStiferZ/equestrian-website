<?php

if ($type == 1) {
    $dir = "../../";
} else {
    $dir = "";
}
if ($type == 1) {
} else {
    session_start();
}
require($dir . "classes/defines.inc.php");


?>
<!DOCTYPE html>
<!-- 
Author: Kenzo Fahem
-->
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Kenzo">
    <title>Dashboard Centre Equestre</title>
    <link rel="apple-touch-icon" href="<?= $dir ?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $dir ?>app-assets/images/logo/lo2go.png">
    <link href="<?= $dir ?>https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/css/core/colors/palette-gradient.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>assets/css/style.css">
    <!-- END: Custom CSS-->

    <!-- BEGIN: Dropzone CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/css/pages/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/css/plugins/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/vendors/css/ui/prism.min.css">
    <!-- END: Dropzone CSS-->

    <!-- BEGIN: SweatAlert2 CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/vendors/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $dir ?>app-assets/vendors/animate/animate.css">
    <!-- END: SweatAlert2 CSS-->



    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= $dir ?>public-home/images/horse-logo.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-normalize.css">
    <!-- Main CSS -->



    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-main.css">
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/horse-style.css">


    <!-- Animate CSS -->

    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-animate.min.css">
    <!-- Icofont CSS-->
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-icofont.css">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-font-awesome.min.css">
    <!-- bicon CSS-->
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-bicon.min.css">
    <!-- Flaticon CSS-->
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/font-flaticon.css">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/OwlCarousel-owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/OwlCarousel-owl.theme.default.min.css">
    <!-- Main Menu CSS -->


    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-meanmenu.min.css">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-nivo-slider.css" type="text/css">
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-preview.css" type="text/css" media="screen">
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="<?= $dir ?>public-home/css/css-magnific-popup.css">
    <!-- Custom CSS -->
    <!-- Modernizr Js -->
    <script src="<?= $dir ?>public-home/js/3056-js-modernizr-2.8.3.min.js"></script>


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="<?= $dir ?>#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="<?= $dir ?>index.php"><img class="brand-logo" alt="Website Logo" src="<?= $dir ?>app-assets/images/logo/lo2go.png">
                            <h4 class="brand-text">Equestrian World</h4>
                        </a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="<?= $dir ?>#"></i></a></li>
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="<?= $dir ?>./">Accueil</a>
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="<?= $dir ?>./chevaux.php">Nos chevaux</a>

                            <!-- <li class=" dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="<?= $dir ?>#2">A propos</a>
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="<?= $dir ?>#3">Pension</a> -->
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="<?= $dir ?>./contact.php">Nous contacter</a>


                        </li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="<?= $dir ?>#"></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Modern..." tabindex="0" data-search="template-list">
                                <div class="search-input-close"><i class="ft-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700"><?php if (!empty($_SESSION)) {
                                                                                                                                                                                                    echo $_SESSION['prenom'] . " " . $_SESSION['nom'];
                                                                                                                                                                                                } ?></span><span class="avatar  <?php if (!empty($_SESSION)) {
                                                                                                                                                                                                                                    echo 'avatar-online';
                                                                                                                                                                                                                                } ?> "><img src=" <?php if (!empty($_SESSION)) {
                                                                                                                                                                                                                                                        echo  $dir . "assets/uploadimg/" . $_SESSION['photo'];
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                        echo "app-assets/images/logo/user.png";
                                                                                                                                                                                                                                                    } ?>" alt="avatar"><i></i></span></a>
                            <?php if (empty($_SESSION)) {
                            ?>
                                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?= $dir ?>models/connexion/"><i class="ft-user"></i> Se connecter</a>
                                <?
                            } else { ?>


                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?= $dir ?>models/account/index.php"><i class="ft-user"></i> Compte</a>
                                        <?php
                                        if ($_SESSION['admin'] == 0) {
                                        ?>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= $dir ?>models/usercalendar/index.php"><i class="ft-calendar"></i> Cours</a>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= $dir ?>models/contact/index.php"><i class="ft-mail"></i> Contact</a>
                                        <?php
                                        }
                                        ?>

                                        <form action="<?= $dir ?>models/account/traitement.php" method="POST">
                                            <div class="dropdown-divider"></div><button class="dropdown-item" name="logout"><i class="ft-power"></i> Déconnexion</button>

                                        </form>
                                    </div>


                                <?php
                            } ?>


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->