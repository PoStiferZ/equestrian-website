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
                                <h4 class="card-title" id="basic-layout-card-center">Créer une inscription</h4>
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
                                            <h4 class="form-section"><i class="ft-user"></i>Informations de l'inscription</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinputCavalier">Cavalier</label>
                                                        <input type="text" id="cavalier" class="form-control" placeholder="Cavalier" name="cavalier">
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
                                                        <label for="projectinput2">Année</label>
                                                        <input type="date" id="projectinput2" class="form-control" placeholder="Année" name="an">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Cotisation Centre</label>
                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Cotisation Centre" name="cc">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Cotisation FFE</label>
                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Cotisation FFE" name="cffe">
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