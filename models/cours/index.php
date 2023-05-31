<?php
$title = "cours";
$active = $title;

require("../template/header.php");
require('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Calendrier de cours</title>

    <link href='<?= $dir; ?>packages/core/main.css' rel='stylesheet' />
    <link href='<?= $dir; ?>packages/daygrid/main.css' rel='stylesheet' />
    <link href='<?= $dir; ?>packages/timegrid/main.css' rel='stylesheet' />
    <link href='<?= $dir; ?>packages/list/main.css' rel='stylesheet' />
    <link href="<?= $dir; ?>packages/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href='<?= $dir; ?>packages/datepicker/datepicker.css' rel='stylesheet' />
    <link href='<?= $dir; ?>packages/colorpicker/bootstrap-colorpicker.min.css' rel='stylesheet' />
    <link href='<?= $dir; ?>style.css' rel='stylesheet' />

    <script src='<?= $dir; ?>packages/core/main.js'></script>
    <script src='<?= $dir; ?>packages/daygrid/main.js'></script>
    <script src='<?= $dir; ?>packages/timegrid/main.js'></script>
    <script src='<?= $dir; ?>packages/list/main.js'></script>
    <script src='<?= $dir; ?>packages/interaction/main.js'></script>
    <script src='<?= $dir; ?>packages/jquery/jquery.js'></script>
    <script src='<?= $dir; ?>packages/jqueryui/jqueryui.min.js'></script>
    <script src='<?= $dir; ?>packages/bootstrap/js/bootstrap.js'></script>
    <script src='<?= $dir; ?>packages/datepicker/datepicker.js'></script>
    <script src='<?= $dir; ?>packages/colorpicker/bootstrap-colorpicker.min.js'></script>
    <script src='<?= $dir; ?>calendar.js'></script>
</head>

<body>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Calendrier</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../../index.php">Panneau Administration</a>
                                </li>
                                <li class="breadcrumb-item active">Cours
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <!-- <div class="btn-group float-md-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addeventmodal">
                            Ajouter un cours
                        </button>
                    </div> -->
                </div>
            </div>
            <div class=" content-body"><!-- configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Calendrier des cours</h3>
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
                                        <div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog">
                                                <style>
                                                    .modal-dialog {
                                                        margin: 25rem auto;
                                                    }
                                                </style>
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Ajouter un cours</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="container-fluid">

                                                            <form id="createEvent" class="form-horizontal">

                                                                <div class="row">

                                                                    <div class="col-md-6">

                                                                        <div id="title-group" class="form-group">
                                                                            <label class="control-label" for="title">Nom du cours</label>
                                                                            <input type="text" class="form-control" name="title">
                                                                            <!-- errors will go here -->
                                                                        </div>

                                                                        <div id="edit-title-group" class="form-group">
                                                                            <input type="text" class="form-control" id="editID_Recurrence" name="editID_Recurrence" hidden>
                                                                            <!-- errors will go here -->
                                                                        </div>

                                                                        <div id="startdate-group" class="form-group">
                                                                            <label class="control-label" for="startDate">Date début</label>
                                                                            <input type="text" class="form-control datetimepicker" id="startDate" name="startDate" autocomplete="off">
                                                                            <!-- errors will go here -->
                                                                        </div>

                                                                        <div id="enddate-group" class="form-group">
                                                                            <label class="control-label" for="endDate">Date fin</label>
                                                                            <input type="text" class="form-control datetimepicker" id="endDate" name="endDate" autocomplete="off">
                                                                            <!-- errors will go here -->
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div id="color-group" class="form-group">
                                                                            <label class="control-label" for="color">Couleur de fond</label>
                                                                            <input type="text" class="form-control colorpicker" name="color" value="#6453e9">
                                                                            <!-- errors will go here -->
                                                                        </div>
                                                                        <div hidden id="textcolor-group" class="form-group">
                                                                            <label class="control-label" for="textcolor">Couleur du texte</label>
                                                                            <input type="text" class="form-control colorpicker" name="text_color" value="#ffffff">
                                                                            <!-- errors will go here -->
                                                                        </div>
                                                                        <div id="textcolor-group" class="form-group">
                                                                            <label class="control-label" for="textcolor">Récurrence en mois</label>
                                                                            <select name="selectedRecurrence" class="form-control">
                                                                                <option value="0">Aucune</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                                <option value="6">6</option>
                                                                                <option value="7">7</option>
                                                                                <option value="8">8</option>
                                                                                <option value="9">9</option>
                                                                                <option value="10">10</option>
                                                                                <option value="11">11</option>
                                                                                <option value="12">12</option>
                                                                            </select>
                                                                            <!-- errors will go here -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                                    </div>
                                                    </form>

                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <div class="modal fade text-left" id="editeventmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <button type="text" data-toggle="modal" data-target="#editeventmodal2" class=" form-control  btn-outline-primary">Modifier le cours</button>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="text" id="deleteEvent" class=" form-control  btn-outline-danger" data-id>Supprimer le cours</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <button type="text" data-toggle="modal" data-target="#editeventmodalRec" class=" form-control  btn-outline-success">Modifier la récurrence</button>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="text" class=" form-control  btn-outline-danger" id="deleteEventRec" data-idR>Supprimer la récurrence</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="editeventmodal2" tabindex="-1" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modifier le cours</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <form id="editEventForm" class="form-horizontal">
                                                                <input type="hidden" id="editEventId" name="editEventId" value="">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div id="edit-title-group" class="form-group">
                                                                            <label class="control-label" for="editEventTitle">Nom du cours</label>
                                                                            <input type="text" class="form-control" id="editEventTitle" name="editEventTitle">
                                                                            <!-- errors will go here -->
                                                                        </div>
                                                                        <!--                                                                         <div id="edit-idRec-group" class="form-group">
                                                                            <label class="control-label" for="editIdRecurrence">ID Récurrence</label>
                                                                            <input type="text" class="form-control" id="editIdRecurrence" name="editIdRecurrence">
                                                                        </div> -->

                                                                        <div id="edit-startdate-group" class="form-group">
                                                                            <label class="control-label" for="editStartDate">Date début</label>
                                                                            <input type="text" class="form-control datetimepicker" id="editStartDate" name="editStartDate">
                                                                            <!-- errors will go here -->
                                                                        </div>


                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div id="edit-color-group" class="form-group">
                                                                            <label class="control-label" for="editColor">Couleur</label>
                                                                            <input type="text" class="form-control colorpicker" id="editColor" name="editColor" value="#6453e9">
                                                                            <!-- errors will go here -->
                                                                        </div>
                                                                        <div id="edit-enddate-group" class="form-group">
                                                                            <label class="control-label" for="editEndDate">Date fin</label>
                                                                            <input type="text" class="form-control datetimepicker" id="editEndDate" name="editEndDate">
                                                                        </div>

                                                                        <!-- <div id="edit-textcolor-group" class="form-group">
                                                                            <label class="control-label" for="editTextColor">Couleur du texte</label>
                                                                            <input type="text" class="form-control colorpicker" id="editTextColor" name="editTextColor" value="#ffffff">
                                                                        </div> -->
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <button type="submit" class="btn btn-warning">Enregistrer</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="editeventmodalRec" tabindex="-1" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modifier la récurrence du cours</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <form id="editEventFormRec" class="form-horizontal">
                                                                <input type="hidden" id="editEventId" name="editEventId" value="">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div id="edit-title-group" class="form-group">
                                                                            <label class="control-label" for="editEventTitle">Nom du cours</label>
                                                                            <input type="text" class="form-control" id="editEventTitleRec" name="editEventTitleRec">
                                                                            <!-- errors will go here -->
                                                                        </div>
                                                                        <div id="edit-idRec-group" class="form-group">
                                                                            <!-- <label class="control-label" for="editIdRecurrence">ID Récurrence</label> -->
                                                                            <input type="text" class="form-control" id="editIdRecurrenceRec" name="editIdRecurrenceRec" hidden>
                                                                        </div>
                                                                        <div id="edit-startdate-group" class="form-group">
                                                                            <label class="control-label" for="editStartDate">Date début</label>
                                                                            <input type="text" class="form-control datetimepicker" id="editStartDateRec" name="editStartDateRec">
                                                                            <!-- errors will go here -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div id="edit-color-group" class="form-group">
                                                                            <label class="control-label" for="editColor">Couleur</label>
                                                                            <input type="text" class="form-control colorpicker" id="editColorRec" name="editColorRec" value="#6453e9">
                                                                            <!-- errors will go here -->
                                                                        </div>
                                                                        <div id="edit-enddate-group" class="form-group">
                                                                            <label class="control-label" for="editEndDate">Date fin</label>
                                                                            <input type="text" class="form-control datetimepicker" id="editEndDateRec" name="editEndDateRec">
                                                                        </div>

                                                                        <!-- <div id="edit-textcolor-group" class="form-group">
                                                                            <label class="control-label" for="editTextColor">Couleur du texte</label>
                                                                            <input type="text" class="form-control colorpicker" id="editTextColor" name="editTextColor" value="#ffffff">
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <button type="submit" class="btn btn-warning">Enregistrer</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addeventmodal">
                                                Ajouter un cours
                                            </button>
                                            <div id="calendar"></div>
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
</body>
<?php
require("../template/footer.php");
?>