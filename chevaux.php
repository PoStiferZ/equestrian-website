<?php
$type = 0;
require("public-home/template/header.php");
?>
<!-- Top Bar Space Start-->
<!-- Top Bar Space Start-->
<div id="header-area-space"></div>
<!-- Top Bar Space End-->



<!-- Testimonial Area Start Here -->
<!-- Featured Services Area Start Here -->
<div class="section-space-less30">
    <div class="container ">
        <div class="section-title-bar-left">
            <h2>Tous nos <span>chevaux</span></h2>
        </div>
        <div class="row">
            <?php
            $chevFind = $oCheval->findAll();
            $pensionFind = $oPension->findAll();
            foreach ($chevFind as $value) {
                foreach ($pensionFind as $result) {
                    if ($result['ID_Cheval'] == $value['id']) {
            ?>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-mb-12">
                            <div class="service-layout1">
                                <div class="image-box">
                                    <img src="assets/uploadimg/<?= $value['photo'] ?>" alt="image">
                                </div>
                                <div class="content-box text-center">
                                    <h3><a href="public-home/#"><?= $value['nom'] ?></a></h3>
                                    <p></p>
                                </div>
                            </div>
                        </div>

            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</div>



<?php
require("public-home/template/footer.php");
?>