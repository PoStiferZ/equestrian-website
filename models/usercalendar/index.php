<?php
$title = "settings account";
session_start();
$type = 1;
if ($_SESSION['admin'] == 1) {
    require("../template/header.php");
} else {
    require("../../public-home/template/header.php");
}
require('traitement.php');

?>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Cours</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="../../">Accueil</a>
                            </li>
                            <li class="breadcrumb-item active">Cours
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
                                    <i class="ft-calendar mr-50"></i>
                                    Cours
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <i class="ft-calendar mr-50"></i>
                                    Inscription
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex" id="account-pill-password2" data-toggle="pill" href="#account-vertical-password2" aria-expanded="false">
                                    <i class="ft-calendar mr-50"></i>
                                    Désinscription
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
                                            <div>
                                                <h3>Cours</h3>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="card-content collapse show">
                                                    <div class="card-body card-dashboard">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered zero-configuration">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nom du cours</th>
                                                                        <th>Date</th>
                                                                        <th>Horaire</th>
                                                                        <th>Durée</th>
                                                                        <th>Présence / Absence</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php


                                                                    foreach ($alldata as $data) {
                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <p class="td-p1-nom"><?= $data['title'] ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="td-p1-nom"><?php $date = date_create($data['startEvent']);
                                                                                                        setlocale(LC_TIME, 'fra');
                                                                                                        echo utf8_encode(ucfirst(strftime('%A, %e %B %Y', strtotime($date->format('Y-m-d')))));

                                                                                                        ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="td-p1-nom"><?php $date = date_create($data['startEvent']);
                                                                                                        $date2 = date_create($data['end_event']);
                                                                                                        echo date_format($date, "H:i") . " - " . date_format($date2, "H:i");
                                                                                                        ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <p class="td-p1-nom"><?= $data['duree'] . " h" ?></p>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($data['presence'] == 0) {
                                                                                ?>
                                                                                    <form action="index.php" method="POST">
                                                                                        <input type="text" name="page" value="<?= $_GET['page'] ?>" hidden>
                                                                                        <input type="text" value="<?= $_SESSION['id'] ?>" name="idPersonne" hidden>
                                                                                        <input type="text" value="<?= $data['id'] ?>" name="idCours" hidden>
                                                                                        <button class="btn btn-danger" name="bePresent"> Absent(e)</button>
                                                                                    </form>
                                                                                <?
                                                                                } else {
                                                                                ?>
                                                                                    <form action="index.php" method="POST">
                                                                                        <input type="text" name="page" value="<?= $_GET['page'] ?>" hidden>
                                                                                        <input type="text" value="<?= $_SESSION['id'] ?>" name="idPersonne" hidden>
                                                                                        <input type="text" value="<?= $data['id'] ?>" name="idCours" hidden>
                                                                                        <button class="btn btn-success" name="beMissing"> Présent(e)</button>
                                                                                    </form>
                                                                                <?
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                        <?php
                                                                    }
                                                                        ?>
                                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                            <nav aria-label="...">
                                                                <ul class="pagination">
                                                                    <li class="page-item">
                                                                        <?php
                                                                        if ($page > 1) {
                                                                            echo '<a class="page-link bg-dark text-white" href="?page=' . ($page - 1) . '&limit=' . $limit . '">Précédent</a>';
                                                                        }
                                                                        ?>
                                                                    </li>
                                                                    <?php
                                                                    for ($i = 1; $i <= $pages; $i++) {
                                                                        if ($i == $page) {
                                                                    ?>
                                                                            <li class="page-item active">
                                                                                <a class="page-link bg-dark  border-dark" href="#"><?= $i ?></a>
                                                                            </li>
                                                                    <?php
                                                                        } else {
                                                                            echo '<a class="page-link text-dark  border-dark " href="?page=' . $i . '&limit=' . $limit . '">' . $i . '</a>';
                                                                        }
                                                                    }
                                                                    if ($page < $pages) {
                                                                        echo '<a class="page-link bg-dark text-white" href="?page=' . ($page + 1) . '&limit=' . $limit . '">Suivant</a>';
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- S'INSCRIRE à UN COURS - START -->
                                        <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form action="index.php" method="POST">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <!-- ON Récupère l'id de session de l'utilisateur -->
                                                            <input type="text" name="idPersonne" value="<?= $_SESSION['id']; ?>" hidden>
                                                            <label>Cours</label>
                                                            <select name="idCours" class="form-control">
                                                                <!-- On récupère le titre et l'id de recurrence du cours -->

                                                                <?php
                                                                if (empty($allDataInscriptionCours)) {
                                                                    echo "<option> Aucun cours disponible</option>";
                                                                    $disabled = "disabled";
                                                                } else {
                                                                    foreach ($allDataInscriptionCours as $value) {
                                                                        echo "<option " . " value='" . $value['idRecurrence'] . "' >" . $value['title'] . "</option>";
                                                                    }
                                                                    $disabled = "";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-success mr-sm-1 mb-1 mb-sm-0" name="newInscriptionCours" <?= $disabled ?>>Sauvegarder</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- S'INSCRIRE à UN COURS - END -->
                                        <div class="tab-pane fade" id="account-vertical-password2" role="tabpanel" aria-labelledby="account-pill-password2" aria-expanded="false">
                                            <form action="index.php" method="POST">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <!-- ON Récupère l'id de session de l'utilisateur -->
                                                            <input type="text" name="idPersonne" value="<?= $_SESSION['id']; ?>" hidden>
                                                            <label>Cours</label>
                                                            <select name="idCours" class="form-control">
                                                                <!-- On récupère le titre et l'id de recurrence du cours -->
                                                                <?php
                                                                if (empty($inscriptionById)) {
                                                                    echo "<option> Aucune inscription à un cours</option>";
                                                                    $disabled = "disabled";
                                                                } else {
                                                                    foreach ($inscriptionById as $value) {
                                                                        echo "<option " . " value='" . $value['idRecurrence'] . "' >" . $value['title'] . "</option>";
                                                                    }
                                                                    $disabled = "";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-danger mr-sm-1 mb-1 mb-sm-0" name="deleteInscription" <?= $disabled ?>>Se désinscrire</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="../account/traitement.php" method="POST">
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

<?php
require("../template/footer.php"); ?>