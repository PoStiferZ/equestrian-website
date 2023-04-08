<?php
if (isset($type) && $type == 1) {
} else {
    session_start();
    if ($_SESSION['admin'] != 1) {
        header("Location: ../../");
    }
}
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
    <link rel="apple-touch-icon" href="../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../app-assets/images/logo/lo2go.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/core/colors/palette-gradient.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <!-- END: Custom CSS-->

    <!-- BEGIN: Dropzone CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/pages/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/plugins/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/ui/prism.min.css">
    <!-- END: Dropzone CSS-->

    <!-- BEGIN: SweatAlert2 CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/animate/animate.css">
    <!-- END: SweatAlert2 CSS-->



</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="Website Logo" src="../../app-assets/images/logo/lo2go.png">
                            <h4 class="brand-text">Equestrian World</h4>
                        </a></li>
                    <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Equestrian</a>
                        </li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore Modern..." tabindex="0" data-search="template-list">
                                <div class="search-input-close"><i class="ft-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700"><?= $_SESSION['prenom'] . " " . $_SESSION['nom'] ?></span><span class="avatar avatar-online"><img src="../../assets/uploadimg/<?= $_SESSION['photo'] ?>" alt="avatar"><i></i></span></a>

                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="../account/index.php"><i class="ft-user"></i> Compte</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="../contact/index.php" name="logout"><i class="ft-mail"></i> Contact</a>

                                <form action="../account/traitement.php" method="POST">
                                    <div class="dropdown-divider"></div><button class="dropdown-item" href="../account/traitement.php" name="logout"><i class="ft-power"></i> Déconnexion</button>

                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span data-i18n="Admin Panels">
                    </span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
                </li>
                <li class=" nav-item"><a href="../../index.php"><i class="la la-home"></i><span class="menu-title" data-i18n="eCommerce">Accueil</span></a>

                <li class=" navigation-header"><span data-i18n="Admin Panels">Panneau d'administration
                    </span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
                </li>

                <li class=" nav-item"><a href="../cavalier/index.php"><i class="la la-user"></i><span class="menu-title" data-i18n="eCommerce">Cavalier</span></a>
                </li>
                <li class=" nav-item"><a href="../cours/index.php"><i class="la la-calendar"></i><span class="menu-title" data-i18n="Hospital">Cours</span></a>
                </li>
                <li class=" nav-item"><a href="../cheval/index.php"><i class="la"><img src="../../app-assets/images/logo/horse.png" alt=""></i><span class="menu-title" data-i18n="Crypto">Cheval</span></a>
                </li>
                <li class=" nav-item"><a href="../robe/index.php"><i class="la la-tag"></i><span class="menu-title" data-i18n="Support Ticket">Robe</span></a>
                </li>
                <li class=" nav-item"><a href="../pension/index.php"><i class="la"><img src="../../app-assets/images/logo/pension.png" alt=""></i><span class="menu-title">Pension</span></a>
                </li>
                <li class=" nav-item"><a href="../typepension/index.php"><i class="la la-tag"></i><span class="menu-title" data-i18n="Bank">Type Pension</span></a>
                </li>
                <li class=" nav-item"><a href="../inscription/index.php"><i class="la la-tag"></i><span class="menu-title" data-i18n="Bank">Inscription</span></a>
                </li>
                <li class=" nav-item"><a href="../tarif/index.php"><i class="la"><img src="../../app-assets/images/logo/tarifs.png" alt=""></i><span class="menu-title" data-i18n="Bank">Tarifs</span></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->