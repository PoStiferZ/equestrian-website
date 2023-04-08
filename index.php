<?php
$type = 0;
require("public-home/template/header.php");
?>
<!-- Top Bar Space Start-->
<!-- Top Bar Space Start-->
<div id="header-area-space"></div>
<!-- Top Bar Space End-->
<!-- Slider Area Start Here -->
<div class="slider-area layout2 slider">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider-3" class="slides">
            <img src="public-home/images/slider-s1.jpg" alt="slider" title="#slider-direction-1">
            <img src="public-home/images/slider-s2.jpg" alt="slider" title="#slider-direction-2">
            <img src="public-home/images/slider-s3.jpg" alt="slider" title="#slider-direction-3">
        </div>
        <div id="slider-direction-1" class="t-cn slider-direction">
            <div class="slider-content s-tb slide-5">
                <div class="title-container s-tb-c">
                    <div class="small-title">Bienvenue à Equestrian World</div>
                    <div class="big-title">Chevaux &amp; Cavaliers</div>
                    <div class="title-text">Découvrez le monde merveilleux de l'équitation avec notre centre équestre, où passion, expertise et amour des chevaux se rejoignent pour offrir une expérience unique et inoubliable.</div>
                </div>
            </div>
        </div>
        <div id="slider-direction-2" class="t-cn slider-direction">
            <div class="slider-content s-tb slide-6">
                <div class="title-container s-tb-c">
                    <div class="small-title">Bienvenue à Equestrian World</div>
                    <div class="big-title">Chevaux &amp; Cavaliers</div>
                    <div class="title-text">Découvrez le monde merveilleux de l'équitation avec notre centre équestre, où passion, expertise et amour des chevaux se rejoignent pour offrir une expérience unique et inoubliable.</div>
                </div>
            </div>
        </div>
        <div id="slider-direction-3" class="t-cn slider-direction">
            <div class="slider-content s-tb slide-6">
                <div class="title-container s-tb-c">
                    <div class="small-title">Bienvenue à Equestrian World</div>
                    <div class="big-title">Chevaux &amp; Cavaliers</div>
                    <div class="title-text">Découvrez le monde merveilleux de l'équitation avec notre centre équestre, où passion, expertise et amour des chevaux se rejoignent pour offrir une expérience unique et inoubliable.</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End Here -->


<!-- Testimonial Area Start Here -->
<!-- Featured Services Area Start Here -->
<div class="section-space-less30">
    <div class="container ">
        <div class="section-title-bar-left">
            <h2>Nos <span>chevaux</span></h2>
        </div>
        <div class="row">
            <?php
            $chevFind = $oCheval->findAll();
            $pensionFind = $oPension->findAll();
            $i = 0;
            foreach ($chevFind as $value) {
                $i++;

                foreach ($pensionFind as $result) {
                    if ($result['ID_Cheval'] == $value['ID_Cheval'] && $i < 4) {
            ?>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-mb-12">
                            <div class="service-layout1">
                                <div class="image-box">
                                    <img src="assets/uploadimg/<?= $value['photo'] ?>" alt="image">
                                </div>
                                <div class="content-box text-center">
                                    <h3><a href="public-home/#"><?= $value['nom_Cheval'] ?></a></h3>
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
        <a class="btn btn-dark text-white" href="chevaux.php">Voir plus</a>

    </div>
</div>
<!-- Featured Services Area End Here -->
<!-- Testimonial Area Start Here -->

<!-- Process Area Start Here -->
<div class="section-space-less30">
    <div class="container">
        <div class="section-title-primary text-center">
            <h2>Prêt à devenir un cavalier aguerri ? </h2>
            <p>Rejoignez notre centre équestre et découvrez notre passion pour les chevaux, nos instructeurs expérimentés et notre ambiance chaleureuse pour vivre une expérience équestre inoubliable.</p>
        </div>
        <div class="row">

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="process-content-layout1">
                    <h3>Découvrez notre centre équestre de renommée mondiale</h3>
                    <p>Nous sommes fiers d'offrir des installations exceptionnelles, des instructeurs qualifiés et des programmes équestres variés pour les cavaliers de tous niveaux.</p>
                    <ul>
                        <li><a href="public-home/#">Cours d'équitation pour tous niveaux</a></li>
                        <li><a href="public-home/#">Promenades à cheval</a></li>
                        <li><a href="public-home/#">Pension pour chevaux</a></li>
                        <li><a href="public-home/#">Stages d'équitation</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="process-image-box">
                    <img src="public-home/images/about-about-4.jpg" alt="img">
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Process Area Start Here -->
<!-- Mission Vission Area Start Here -->
<div class="section-space-less30 bg-gray4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="mission-vission-layout1">
                    <div class="image-box text-center">

                        <img src="public-home/images/about-about-1.jpg" alt="img">
                    </div>
                    <div class="content-box text-center">
                        <h2>Notre mission</h2>
                        <p>Chez Equestrian World est de promouvoir l'amour et le respect des chevaux, ainsi que de fournir une expérience équestre de qualité supérieure à tous nos clients. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mission-vission-layout1">
                    <div class="image-box text-center">

                        <img src="public-home/images/about-about-2.jpg" alt="img">
                    </div>
                    <div class="content-box text-center">
                        <h2>Nos objectifs</h2>
                        <p>Notre objectif est de créer une communauté équestre passionnée et engagée, où chacun peut découvrir la beauté et l'émerveillement de l'équitation et développer une relation positive et durable avec ces animaux majestueux.</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="mission-vission-layout1">
                    <div class="image-box text-center">

                        <img src="public-home/images/about-about-3.jpg" alt="img">
                    </div>
                    <div class="content-box text-center">
                        <h2>Notre expérience</h2>
                        <p> Notre centre équestre est fier de posséder des installations de pointe, des équipements de qualité supérieure et un environnement accueillant et sécuritaire pour nos chevaux et nos clients. </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Mission Vission Area End Here -->

<div class="section-space-less30">
    <div class="container">
        <div class="section-title-primary text-center">
            <h2>Nos experts de l'équitation</h2>
            <p>Notre équipe est composée d'experts passionnés de l'équitation, dédiés à partager leur savoir-faire et leur expérience avec nos clients. Nous offrons des conseils personnalisés, des cours de qualité supérieure et une expertise approfondie en matière d'équitation pour tous les niveaux de cavaliers.</p>
        </div>
        <!-- <div class="row">
            <div class="col-md-4">
                <div class="expart-team-layout2">
                    <div class="image-box">
                        <img src="public-home/images/team-t1.jpg" alt="expart-img">
                        <div class="content-box shadow-equal text-center">
                            <h2>Taofiqul hakim</h2>
                            <span>Senior Architect</span>
                            <p>Neque porro quisquam est qui dolorem ipsum quia he dolor sit amet, consec tetur adipisci velit adipisci velit.</p>
                            <ul>
                                <li><a href="public-home/#" title="facebook"><i class="icofont icofont-social-facebook"></i></a></li>
                                <li><a href="public-home/#" title="twitter"><i class="icofont icofont-social-twitter"></i></a></li>
                                <li><a href="public-home/#" title="google"><i class="icofont icofont-social-google-plus"></i></a></li>
                                <li><a href="public-home/#" title="dribbble"><i class="icofont icofont-social-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- Expert Team Area End Here -->



<?php
require("public-home/template/footer.php");
?>