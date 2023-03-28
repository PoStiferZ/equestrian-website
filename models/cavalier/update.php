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
        foreach ($cavFindId as $cavalier) {
        ?>
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="basic-form-layouts">

                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-card-center">Modifier un cavalier</h4>
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
                                            <input type="hidden" name="ID_Personne" class="inputID" value="<?= $cavalier['ID_Personne'] ?>">

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>Informations personnelles</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Prénom</label>
                                                            <input type="text" id="projectinput1" class="form-control" name="nom" value="<?= $cavalier['nom'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">Nom</label>
                                                            <input type="text" id="projectinput2" class="form-control" name="prenom" value="<?= $cavalier['prenom'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput3">E-mail</label>
                                                            <input type="text" id="projectinput3" class="form-control" name="mail" value="<?= $cavalier['mail'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput3">Téléphone</label>
                                                            <input type="text" id="projectinput3" class="form-control" name="telephone" value="<?= $cavalier['telephone'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput4">Date de naissance</label>
                                                            <input type="date" id="projectinput4" class="form-control" name="dna" value="<?= $cavalier['dateNaissance'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-2">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#default">
                                                                <i class="la la-folder"></i> Changer de photo
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="form-section"><i class="la la-paperclip"></i> Autres</h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput3">Numéro FFE</label>
                                                            <input type="text" id="projectinput3" class="form-control" name="licence" value="<?= $cavalier['numeroLicence'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput3">Niveau Galop</label>
                                                            <select id="projectinput3" name="nvGalop" class="form-control">
                                                                <option <?php if ($cavalier['niveauGalop'] == 1) {
                                                                            echo "selected=''";
                                                                        } ?> value="1">1</option>
                                                                <option <?php if ($cavalier['niveauGalop'] == 2) {
                                                                            echo "selected=''";
                                                                        } ?> value="2">2</option>
                                                                <option <?php if ($cavalier['niveauGalop'] == 3) {
                                                                            echo "selected=''";
                                                                        } ?> value="3">3</option>
                                                                <option <?php if ($cavalier['niveauGalop'] == 4) {
                                                                            echo "selected=''";
                                                                        } ?> value="3">4</option>
                                                                <option <?php if ($cavalier['niveauGalop'] == 5) {
                                                                            echo "selected=''";
                                                                        } ?> value="5">5</option>
                                                                <option <?php if ($cavalier['niveauGalop'] == 6) {
                                                                            echo "selected=''";
                                                                        } ?> value="6">6</option>
                                                                <option <?php if ($cavalier['niveauGalop'] == 7) {
                                                                            echo "selected='6'";
                                                                        } ?> value="7">7</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                if (!empty($cavalier['ID_Responsable'])) {
                                                ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaultResponsable">
                                                                    <i class="la la-user"></i> Modifier le responsable
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <div class="form-actions">
                                                    <button type="submut" class="btn btn-danger mr-1" name="close">
                                                        <i class="ft-x"></i> Annuler
                                                    </button>
                                                    <button type="submit" class="btn btn-success" name="Update">
                                                        <i class="la la-check-square-o"></i> Enregistrer les modifications
                                                    </button>
                                                </div>
                                                <!-- START: Modal Photo-->
                                                <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                                                            </div>
                                                                            <div class="card-content collapse show">
                                                                                <div class="card-body">
                                                                                    <div class="dz-message">Glisser / Déposer son image</div>
                                                                                    <input type="file" class="dropzone dropzone-area" id="dpz-single-file" name="photo" value="<?= $cavalier['photo'] ?>">
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
                                                <!-- END : MODAL PHOTO-->

                                                <!-- START : Modal Responsable -->
                                                <div class="modal fade text-left" id="defaultResponsable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput1">Prénom</label>
                                                                                        <input type="text" id="projectinput1" class="form-control" placeholder="Prénom" name="prenomResp">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput2">Nom</label>
                                                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Nom" name="nomResp">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput3">E-mail</label>
                                                                                        <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="mailResp">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput3">Téléphone</label>
                                                                                        <input type="text" id="projectinput3" class="form-control" placeholder="Téléphone" name="telResp">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput3">Date de naissance</label>
                                                                                        <input type="date" id="projectinput3" class="form-control" placeholder="Date de naissance" name="dnaResp">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput3">Rue</label>
                                                                                        <input type="text" id="projectinput3" class="form-control" placeholder="Rue" name="rue">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput3">Code Postal</label>
                                                                                        <input type="text" id="projectinput3" class="form-control" placeholder="Code Postal" name="cp">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="projectinput3">Ville</label>
                                                                                        <input type="text" id="projectinput3" class="form-control" placeholder="Ville" name="ville">
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