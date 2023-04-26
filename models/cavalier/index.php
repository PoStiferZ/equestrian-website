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
                <h3 class="content-header-title mb-0 d-inline-block">Table Cavalier</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../index.php">Panneau Administration</a>
                            </li>
                            <li class="breadcrumb-item active">Cavalier
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
                <div class="users-list-filter px-1">
                    <form method="POST" action="index.php">
                        <div class="row border border-light rounded py-2 mb-2">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-major">Majorité</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-major" name="filter_major" multiple>
                                        <option value="true" <?php if (isset($_POST['filter_major']) && $_POST['filter_major'] == "true") echo 'selected'; ?>>Oui</option>
                                        <option value="false" <?php if (isset($_POST['filter_major']) && $_POST['filter_major'] == "false") echo 'selected'; ?>>Non</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-status">Galop</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-status" name="filter_galop[]" multiple>
                                        <option value="1" <?php if (isset($_POST['filter_galop']) && in_array('1', $_POST['filter_galop'])) echo 'selected'; ?>>1</option>
                                        <option value="2" <?php if (isset($_POST['filter_galop']) && in_array('2', $_POST['filter_galop'])) echo 'selected'; ?>>2</option>
                                        <option value="3" <?php if (isset($_POST['filter_galop']) && in_array('3', $_POST['filter_galop'])) echo 'selected'; ?>>3</option>
                                        <option value="4" <?php if (isset($_POST['filter_galop']) && in_array('4', $_POST['filter_galop'])) echo 'selected'; ?>>4</option>
                                        <option value="5" <?php if (isset($_POST['filter_galop']) && in_array('5', $_POST['filter_galop'])) echo 'selected'; ?>>5</option>
                                        <option value="6" <?php if (isset($_POST['filter_galop']) && in_array('6', $_POST['filter_galop'])) echo 'selected'; ?>>6</option>
                                        <option value="7" <?php if (isset($_POST['filter_galop']) && in_array('7', $_POST['filter_galop'])) echo 'selected'; ?>>7</option>
                                    </select>
                                </fieldset>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#users-list-status').select2({
                                        maximumSelectionLength: 6,
                                        language: {
                                            maximumSelected: function(e) {
                                                return "Vous ne pouvez sélectionner que 6 éléments";
                                            },
                                        },
                                    });
                                });
                                $(document).ready(function() {
                                    $('#users-list-major').select2({
                                        maximumSelectionLength: 1,
                                        language: {
                                            maximumSelected: function(e) {
                                                return "Vous ne pouvez sélectionner qu'un élément";
                                            },
                                        },
                                    });
                                });
                            </script>
                            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                            <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                <button class="btn btn-block btn-primary glow" type="submit">Filtrer</button>
                            </div>
                        </div>
                    </form>
                </div>
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
                                                    <th>Photo</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Naissance</th>
                                                    <th>Mail</th>
                                                    <th>Téléphone</th>
                                                    <th>Galop</th>
                                                    <th>Licence</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                /* Tous les cavaliers */
                                                foreach ($cavFind as $value) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <img src='../../assets/uploadimg/<?= $value['photo'] ?>' class="listPhoto">
                                                        </td>
                                                        <td>
                                                            <p class="td-p1-nom"><?= $value['nom'] ?></p>

                                                        </td>
                                                        <td>
                                                            <p><?= $value['prenom'] ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?php $date = date_create($value['dateNaissance']);
                                                                echo date_format($date, "d/m/Y") ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= $value['mail'] ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= $value['telephone'] ?></p>
                                                        </td>
                                                        <td><?= $value['niveauGalop'] ?></td>
                                                        <td><?= $value['numeroLicence'] ?></td>

                                                        <td>
                                                            <?php if ($value['ID_Responsable'] <> NULL) { ?>
                                                                <?php $respValue = $oCavalier->findResp($value['ID_Responsable']);
                                                                foreach ($respValue as $valueR) {
                                                                ?>
                                                                    <button class="btn btn-resp" data-toggle="modal" data-target="#showResponsable<?= $value['ID_Responsable'] ?>">Responsable</button>

                                                                    <!-- START : Modal Responsable -->
                                                                    <div class="modal fade text-left" id="showResponsable<?= $value['ID_Responsable'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="card">
                                                                                                <div class="card-header">
                                                                                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                                                                                    <h5 class="modal-title">Responsable de <?= $value['prenom'] ?></h5>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="projectinput1">Prénom</label>
                                                                                                            <input type="text" disabled id="projectinput1" class="form-control" value="<?= $valueR['prenom'] ?> ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="projectinput2">Nom</label>
                                                                                                            <input type="text" disabled id="projectinput2" class="form-control" value="<?= $valueR['nom'] ?> ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="projectinput3">E-mail</label>
                                                                                                            <input type="text" disabled id="projectinput3" class="form-control" value="<?= $valueR['mail'] ?> ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="projectinput3">Téléphone</label>
                                                                                                            <input type="text" disabled id="projectinput3" class="form-control" value="<?= $valueR['telephone'] ?> ">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="projectinput3">Date de naissance</label>
                                                                                                            <?php $date = date_create($valueR['dateNaissance']) ?>
                                                                                                            <input type="text" disabled id="projectinput3" class="form-control" value="<?= date_format($date, "d/m/Y") ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="projectinput3">Rue</label>
                                                                                                            <input type="text" disabled id="projectinput3" class="form-control" value="<?= $valueR['rue'] ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="projectinput3">Code Postal</label>
                                                                                                            <input type="text" disabled id="projectinput3" class="form-control" value="<?= $valueR['codePostal'] ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div class="form-group">
                                                                                                            <label for="projectinputVille">Ville</label>
                                                                                                            <input type="text" disabled id="projectinputVille" class="form-control" value="<?= $valueR['ville'] ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Retour</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END : MODAL -->
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="update.php?id=<?= $value['ID_Personne'] ?>"><i class="la la-pencil"></i></a>
                                                        </td>
                                                        <td>
                                                            <a href="index.php?DeleteById=<?= $value['ID_Personne'] ?>"><i class="la la-close"></i></a>
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
            <!--/ configuration table -->
        </div>
    </div>
</div>
<!-- END: Content-->

<?php

require("../template/footer.php");
?>