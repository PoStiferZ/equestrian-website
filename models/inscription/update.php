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
                            <li class="breadcrumb-item active">Modifier
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php
        foreach ($inscriptionFindId as $value) {
        ?>
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="basic-form-layouts">

                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-card-center">Modifier un cheval</h4>
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
                                                <input type="hidden" id="projectinput1" class="form-control" name="idInscription" value="<?= $value['ID_Inscription'] ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Cavalier</label>
                                                            <?php
                                                            $nomLib = $value['nom'];
                                                            $nom = $oInscription->optionPersonne(); ?>
                                                            <select name="idPersonne" class="form-control">
                                                                <?php
                                                                foreach ($nom as $value2) {
                                                                ?>
                                                                    <option value="<?= $value2['ID_Personne'] ?>" <?php if ($value2['nom'] == $nomLib) {
                                                                                                                        echo "selected=''";
                                                                                                                    } ?>> <?= $value2['nom'] . " " . $value2['prenom'] ?> </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Année</label>
                                                            <input type="date" id="projectinput1" class="form-control" name="an" value="<?= $value['annee'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Cotisation Centre</label>
                                                            <input type="text" id="projectinput1" class="form-control" name="cc" value="<?= $value['CotisationCentre'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Cotisation FFE</label>
                                                            <input type="text" id="projectinput1" class="form-control" name="cffe" value="<?= $value['CotisationFFE'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-danger mr-1" name="close">
                                                        <i class="ft-x"></i> Annuler
                                                    </button>
                                                    <button type="submit" class="btn btn-success" name="Update">
                                                        <i class="la la-check-square-o"></i> Enregistrer les modifications
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
        <?php
        }
        ?>
    </div>
</div>
<!-- END: Content-->
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php
require("../template/footer.php");
?>