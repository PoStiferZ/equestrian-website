<?php
$title = "settings account";
session_start();
$type = 1;
if ($_SESSION['admin'] == 1) {
    require("../template/header.php");
} else {
    require("../../public-home/template/header.php");
}

?>

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

                            <li class="breadcrumb-item"><a href="#">Panneau Configuration</a>
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
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form action="traitement.php" method="POST" enctype="multipart/form-data">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img src="../../assets/uploadimg/<?= $_SESSION['photo'] ?>" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column jus  tify-content-start">
                                                            <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Modifier la photo</label>
                                                            <input type="file" id="account-upload" name="photo" hidden>
                                                        </div>

                                                    </div>
                                                    <?php
                                                    if ($_SESSION['admin'] == 1) {
                                                    ?>
                                                        <label class="btn btn-sm btn-warning ml-50 mb-50 mb-sm-0 cursor-pointer">Session Admin</label>

                                                    <?
                                                    } else {
                                                    ?>
                                                        <label class="btn btn-sm btn-warning ml-50 mb-50 mb-sm-0 cursor-pointer">Session Utilisateur</label>

                                                    <?php
                                                    }
                                                    ?>
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
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form action="traitement.php" method="POST">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-old-password">Ancien mot de passe</label>
                                                                <input type="password" class="form-control" id="account-old-password" required placeholder="Ancien mot de passe" name="oldPassword">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-new-password">Nouveau mot de passe</label>
                                                                <input type="password" id="account-new-password" class="form-control" placeholder="Nouveau mot de passe" required minlength="1" name="newPassword">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-retype-new-password">Confirmer mot de passe</label>
                                                                <input type="password" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="Confirmer mot de passe" minlength="1" name="confirmPassword">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-success mr-sm-1 mb-1 mb-sm-0" name="btnNewPassword">Sauvegarder</button>
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

<?php require("../template/footer.php"); ?>