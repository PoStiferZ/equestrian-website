<?php
session_start();
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Paramètres du compte</title>
    <link rel="apple-touch-icon" href="../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/forms/toggle/switchery.min.css">
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
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/plugins/pickers/daterange/daterange.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">





    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Compte</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pages</a>
                                </li>
                                <li class="breadcrumb-item active">Paramètres du compte
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body"><!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="ft-globe mr-50"></i>
                                        Générale
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="ft-lock mr-50"></i>
                                        Modifier mot de passe
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <form action="traitement.php" method="POST" enctype="multipart/form-data">
                                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                    <div class="media">
                                                        <a href="javascript: void(0);">
                                                            <img src="../../assets/uploadimg/<?= $_SESSION['photo'] ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                        </a>
                                                        <div class="media-body mt-75">
                                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                <input type="file" name="photo">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <input type="text" class="form-control" placeholder="Nom" value="<?= $_SESSION['id'] ?>" name="id" hidden required>
                                                                </div>
                                                                <div class="controls">
                                                                    <label for="account-first-name">Nom</label>
                                                                    <input type="text" class="form-control" placeholder="Nom" value="<?= $_SESSION['nom'] ?>" name="nom" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Prénom</label>
                                                                    <input type="text" class="form-control" placeholder="Prenom" value="<?= $_SESSION['prenom'] ?>" name="prenom" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-birth">Date de naissance</label>
                                                                    <input type="date" class="form-control" placeholder="Date de naissance" value="<?= $_SESSION['naissance'] ?>" name="naissance" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Mail</label>
                                                                    <input type="email" class="form-control" placeholder="Mail" value="<?= $_SESSION['mail'] ?>" name="mail" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-phone">Téléphone</label>
                                                                    <input type="text" class="form-control" placeholder="Téléphone" value="<?= $_SESSION['telephone'] ?>" name="telephone" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-licence">Licence</label>
                                                                    <input type="text" class="form-control" placeholder="Licence" value="<?= $_SESSION['licence'] ?>" name="licence">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-galop">Galop</label>
                                                                    <input type="text" class="form-control" placeholder="Galop" value="<?= $_SESSION['galop'] ?>" name="galop">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-success mr-sm-1 mb-1 mb-sm-0" name="update">Sauvegarder</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                <form novalidate>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-old-password">Ancien mot de passe</label>
                                                                    <input type="password" class="form-control" id="account-old-password" required placeholder="Ancien mot de passe" data-validation-required-message="This old password field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-new-password">Nouveau mot de passe</label>
                                                                    <input type="password" name="password" id="account-new-password" class="form-control" placeholder="Nouveau mot de passe" required data-validation-required-message="The password field is required" minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-retype-new-password">Confirmer le nouveau mot de passe</label>
                                                                    <input type="password" name="con-password" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="Nouveau mot de passe" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-success mr-sm-1 mb-1 mb-sm-0">Sauvegarder</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="traitement.php" method="POST">
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                    <button type="submit" class="btn btn-danger mr-sm-1 mb-1 mb-sm-0" name="logout">Déconnexion</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </section>
                <!-- account setting page end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../app-assets/vendors/js/forms/toggle/switchery.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../app-assets/js/core/app.min.js"></script>
    <script src="../../app-assets/js/scripts/customizer.min.js"></script>
    <script src="../../app-assets/js/scripts/footer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../app-assets/js/scripts/pages/account-setting.min.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>