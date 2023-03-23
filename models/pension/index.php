<?php
$title = "cavalier";
$typeFile = "index";
require("../template/header.php");
if ($title != 'cours') {
    require('traitement.php');
}
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Table Pension</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../index.php">Panneau Administration</a>
                            </li>
                            <li class="breadcrumb-item active">Pension
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <a class="btn btn-info mb-1" href="create.php">Ajouter</a>
                </div>
            </div>
        </div>
        <div class=" content-body"><!-- configuration table -->
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">LISTE</h3>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Personne</th>
                                                    <th>Cheval</th>
                                                    <th>Type de pension</th>
                                                    <th>Tarif</th>
                                                    <th>Date de Début</th>
                                                    <th>Date de Fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                /* Tous les cavaliers */
                                                foreach ($pensionFind as $value) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <p class="td-p1-nom"><?php
                                                                                    $findPens = $oPension->findByIdPension($value['ID_Pension']);
                                                                                    foreach ($findPens as $idPens) {
                                                                                        $findID0 = $oPension->findByIdSigne($idPens['ID_Personne']);
                                                                                        foreach ($findID0 as $value0) {
                                                                                            echo $value0['nom'] . " " . $value0['prenom'];
                                                                                        }
                                                                                    }
                                                                                    ?></p>
                                                        </td>
                                                        <td>
                                                            <p class="td-p1-nom"><?php
                                                                                    $findID3 = $oCheval->findById($value['ID_Cheval']);
                                                                                    foreach ($findID3 as $value3) {
                                                                                        echo $value3['nom_Cheval'];
                                                                                    } ?></p>
                                                        </td>
                                                        <td>
                                                            <p class="td-p1-nom"><?php
                                                                                    $findID = $oTypePension->findById($value['ID_TP']);
                                                                                    foreach ($findID as $value1) {
                                                                                        echo $value1['libelle_TP'];
                                                                                    } ?></p>
                                                        </td>

                                                        <td>
                                                            <p class="td-p1-nom"><?php
                                                                                    $findID2 = $oTarif->findById($value['ID_Tarif']);
                                                                                    foreach ($findID2 as $value2) {
                                                                                        echo $value2['libelleTarif'];
                                                                                    } ?></p>
                                                        </td>

                                                        <td>
                                                            <p class="td-p1-nom"><?php $date = date_create($value['dateDebut']);
                                                                                    echo date_format($date, "d/m/y") ?></p>
                                                        </td>
                                                        <td>
                                                            <p class="td-p1-nom"><?php $date = date_create($value['dateFin']);
                                                                                    echo date_format($date, "d/m/y") ?></p>
                                                        </td>

                                                        <td>
                                                            <a href="update.php?id=<?= $value['ID_Pension'] ?>"><i class="la la-pencil"></i></a>
                                                        </td>
                                                        <td>
                                                            <a href="index.php?DeleteById=<?= $value['ID_Pension'] ?>"><i class="la la-close"></i></a>

                                                        </td>
                                                    <?php
                                                }
                                                    ?>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<?php
require("../template/footer.php");
?>

<?php
$title = "create";
require("../template/header.php");
if ($title != 'cours') {
    require('traitement.php');
}
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Formulaire</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../index.php">Panneau Administration</a>
                            </li>
                            <li class="breadcrumb-item"><a href="index.php">Liste</a>
                            </li>
                            <li class="breadcrumb-item active">Création
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body"><!-- Basic form layout section start -->
            <section id="basic-form-layouts">

                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-card-center">Créer un cheval</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" method="POST" action="traitement.php" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i>Informations du cheval</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Nom</label>
                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Nom" name="nomC">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Date de naissance</label>
                                                        <input type="date" id="projectinput2" class="form-control" placeholder="Date de naissance" name="dnaC">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">SIR</label>
                                                        <input type="text" id="projectinput2" class="form-control" placeholder="SIR" name="sir">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Robe</label>
                                                        <?php
                                                        $robe = $oRobe->findAll(); ?>
                                                        <select name="idRobe" class="form-control">
                                                            <?php
                                                            foreach ($robe as $value) {
                                                                echo "<option value='" . $value['ID_Robe'] . "' >" . $value['libelleRobe'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-danger mr-1" name="close">
                                                    <i class="ft-x"></i> Annuler
                                                </button>
                                                <button type="submit" class="btn btn-success" name="submit">
                                                    <i class="la la-check-square-o"></i> Créer
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
<!-- END: Content-->

</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php
require("../template/footer.php");
?>