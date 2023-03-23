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
                                <h4 class="card-title" id="basic-layout-card-center">Créer une pension</h4>
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
                                            <h4 class="form-section"><i class="ft-user"></i>Informations du pensionnaire</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Cavalier</label>
                                                        <?php
                                                        $personne = $oCavalier->findAll();
                                                        ?>
                                                        <select name="idPers" class="form-control">
                                                            <?php foreach ($personne as $value2) {
                                                                $idPers = $value2['ID_Personne'];
                                                            ?>

                                                            <?php
                                                                echo "<option " . " value='" . $value2['ID_Personne'] . "' >" . $value2['nom'] . " " . $value2['prenom'] . "</option>";
                                                            }
                                                            ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Cheval</label>
                                                        <?php
                                                        $cheval = $oCheval->findAll();
                                                        ?>
                                                        <select name="idChev" class="form-control">
                                                            <?php foreach ($cheval as $value2) {
                                                                $idChev = $value2['ID_Cheval'];
                                                            ?>

                                                            <?php
                                                                echo "<option " . " value='" . $value2['ID_Cheval'] . "' >" . $value2['nom_Cheval'] . "</option>";
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Type Pension</label>
                                                        <?php
                                                        $typePension = $oTypePension->findAll();
                                                        ?>
                                                        <select name="idTP" class="form-control">
                                                            <?php foreach ($typePension as $value2) {
                                                                $idTP = $value2['ID_TP'];
                                                            ?>
                                                            <?php
                                                                echo "<option " . " value='" . $value2['ID_TP'] . "' >" . $value2['libelle_TP'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Tarif</label>
                                                        <?php
                                                        $tarif = $oTarif->findAll();
                                                        ?>
                                                        <select name="idTar" class="form-control">
                                                            <?php foreach ($tarif as $value2) {
                                                                $idTar = $value2['ID_TP'];
                                                            ?>

                                                            <?php
                                                                echo "<option " . " value='" . $value2['ID_Tarif'] . "' >" . $value2['libelleTarif'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Date début</label>
                                                        <input type="date" id="projectinput2" class="form-control" placeholder="Date début" name="dD">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Date fin</label>
                                                        <input type="date" id="projectinput2" class="form-control" placeholder="Date fin" name="dF">
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