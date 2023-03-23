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
        <!-- Confirm option section start -->
        <section id="confirm-option">
            <div class="row mt-1">
                <div class="col-md-6 col-sm-12">
                    <button type="button" class="btn btn-outline-pr imary mb-2" id="confirm-text">Supprimer</button>
                </div>
            </div>
        </section>
        <!-- // Confirm option section end -->
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