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
        foreach ($pensionFindId as $value) {
        ?>
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="basic-form-layouts">

                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-card-center">Modifier une pension</h4>
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
                                                <input type="hidden" id="projectinput1" class="form-control" name="idPens" value="<?= $value['ID_Pension'] ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinputCavalier">Cavalier</label>
                                                            <?php
                                                            $valuePersonne = $oPension->findByIdPension($value['ID_Pension']);
                                                            foreach ($valuePersonne as $valueP) {
                                                                $valuePers = $oPension->findByIdSigne($valueP['ID_Personne']);
                                                                foreach ($valuePers as $valueName) {
                                                                    $valueNam = $valueName['nom'] . " " . $valueName['prenom'];
                                                                }
                                                            } ?>
                                                            <input type="text" id="cavalier" class="form-control" placeholder="Cavalier" name="cavalier" value="<?= $valueNam ?>">
                                                            <input type="hidden" id="idCavalier" name="idCavalier">

                                                            <script>
                                                                $(document).ready(function() {
                                                                    $.getJSON('personnes.json', function(data) {
                                                                        var cavaliers = [];
                                                                        $.each(data, function(index, cavalier) {
                                                                            cavaliers.push({
                                                                                value: cavalier.value,
                                                                                id: cavalier.id
                                                                            });
                                                                        });

                                                                        $('#cavalier').autocomplete({
                                                                            source: cavaliers,
                                                                            minLength: 2,
                                                                            select: function(event, ui) {
                                                                                var selectedCavalier = ui.item.value;
                                                                                var selectedCavalierId = ui.item.id;
                                                                                $('#idCavalier').val(selectedCavalierId);
                                                                            }
                                                                        });
                                                                    });
                                                                });
                                                            </script>
                                                            <style>
                                                                .ui-autocomplete {
                                                                    z-index: 9999;
                                                                }
                                                            </style>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Cheval</label>
                                                            <?php
                                                            $cheval = $oCheval->findAll();
                                                            ?>
                                                            <select name="idChev" class="form-control">
                                                                <?php foreach ($cheval as $value2) {
                                                                    $idChev = $value2['id'];
                                                                ?>

                                                                <?php if ($idChev == $value['id']) {
                                                                        $selected = "selected=''";
                                                                    } else {
                                                                        $selected = "";
                                                                    }
                                                                    echo "<option " . $selected . " value='" . $value2['id'] . "' >" . $value2['nom'] . "</option>";
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Type Pension</label>
                                                            <?php
                                                            $typePension = $oTypePension->findAll();
                                                            ?>
                                                            <select name="idTP" class="form-control">
                                                                <?php foreach ($typePension as $value2) {
                                                                    $idTP = $value2['ID_TP'];
                                                                ?>

                                                                <?php if ($idTP == $value['ID_TP']) {
                                                                        $selected = "selected=''";
                                                                    } else {
                                                                        $selected = "";
                                                                    }
                                                                    echo "<option " . $selected . " value='" . $value2['ID_TP'] . "' >" . $value2['libelle_TP'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Tarif</label>
                                                            <?php
                                                            $tarif = $oTarif->findAll();
                                                            ?>
                                                            <select name="idTar" class="form-control">
                                                                <?php foreach ($tarif as $value2) {
                                                                    $idTar = $value2['ID_Tarif'];
                                                                ?>

                                                                <?php if ($idTar == $value['ID_Tarif']) {
                                                                        $selected = "selected=''";
                                                                    } else {
                                                                        $selected = "";
                                                                    }
                                                                    echo "<option " . $selected . " value='" . $value2['ID_Tarif'] . "' >" . $value2['libelleTarif'] . "</option>";
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Date début</label>
                                                            <input type="date" name="dD" class="form-control" value="<?= $value['dateDebut'] ?>">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Date fin</label>
                                                            <input type="date" name="dF" class="form-control" value="<?= $value['dateFin'] ?>">
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