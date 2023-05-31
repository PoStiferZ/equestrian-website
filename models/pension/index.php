<?php
$title = "pension";
$active = $title;

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
                                                                                            $name = $value0['nom'] . " " . $value0['prenom'];
                                                                                        }
                                                                                        echo $name;
                                                                                    }
                                                                                    ?></p>
                                                        </td>
                                                        <td>
                                                            <p class="td-p1-nom"><?php
                                                                                    $findID3 = $oCheval->findById($value['ID_Cheval']);
                                                                                    foreach ($findID3 as $value3) {
                                                                                        echo $value3['nom'];
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