<?php

require("classes/defines.inc.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Equestrian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="public-home/images/horse-logo.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="public-home/css/css-normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="public-home/css/css-main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public-home/css/css-bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="public-home/css/css-animate.min.css">
    <!-- Icofont CSS-->
    <link rel="stylesheet" href="public-home/css/css-icofont.css">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="public-home/css/css-font-awesome.min.css">
    <!-- bicon CSS-->
    <link rel="stylesheet" href="public-home/css/css-bicon.min.css">
    <!-- Flaticon CSS-->
    <link rel="stylesheet" href="public-home/css/font-flaticon.css">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="public-home/css/OwlCarousel-owl.carousel.min.css">
    <link rel="stylesheet" href="public-home/css/OwlCarousel-owl.theme.default.min.css">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="public-home/css/css-meanmenu.min.css">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="public-home/css/css-nivo-slider.css" type="text/css">
    <link rel="stylesheet" href="public-home/css/css-preview.css" type="text/css" media="screen">
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="public-home/css/css-magnific-popup.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public-home/css/horse-style.css">
    <!-- Modernizr Js -->
    <script src="public-home/js/3056-js-modernizr-2.8.3.min.js"></script>
</head>

<body>

    <!-- <div id="preloader"></div> -->

    <div id="wrapper" class="wrapper">
        <header>
            <div class="main-menu-area" id="sticker">
                <div class="container">
                    <div class="row d-md-flex align-items-md-center">
                        <div class="col-lg-2 col-md-2">
                            <div class="logo-area">
                                <a href="public-home/index.html"><img src="app-assets/images/logo/lo2go.png" alt="logo" class="img-responsive"></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <nav id="dropdown">
                                <ul class="text-uppercase text-right">
                                    <li><a class="active" href="public-home/#">Accueil</a></li>
                                    <li><a href="public-home/about.html">à propos</a></li>
                                    <li><a href="public-home/#">Pension</a></li>
                                    <li><a href="public-home/contact.html">contacter nous</a></li>
                                    <li><a href="models/connexion/index.php">Se connecter</a></li>

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
    </div>
    </header>
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
                        <div class="big-title">Cheveaux &amp; Cavalier</div>
                        <div class="title-text">Découvrez le monde merveilleux de l'équitation avec notre centre équestre, où passion, expertise et amour des chevaux se rejoignent pour offrir une expérience unique et inoubliable.</div>

                    </div>
                </div>
            </div>
            <div id="slider-direction-2" class="t-cn slider-direction">
                <div class="slider-content s-tb slide-6">
                    <div class="title-container s-tb-c">
                        <div class="small-title">Bienvenue à Equestrian World</div>
                        <div class="big-title">Cheveaux &amp; Cavalier</div>
                        <div class="title-text">Découvrez le monde merveilleux de l'équitation avec notre centre équestre, où passion, expertise et amour des chevaux se rejoignent pour offrir une expérience unique et inoubliable.</div>
                    </div>
                </div>
            </div>
            <div id="slider-direction-3" class="t-cn slider-direction">
                <div class="slider-content s-tb slide-6">
                    <div class="title-container s-tb-c">
                        <div class="small-title">Bienvenue à Equestrian World</div>
                        <div class="big-title">Cheveaux &amp; Cavalier</div>
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
                <h2>Nos <span>chevaux</span> en pension</h2>
            </div>
            <div class="row">
                <?php
                $chevFind = $oCheval->findAll();
                $pensionFind = $oPension->findAll();

                foreach ($chevFind as $value) {
                    foreach ($pensionFind as $result) {
                        if ($result['ID_Cheval'] == $value['ID_Cheval']) {
                ?>
                            <div class="col-lg-3 col-md-3 col-xs-3 col-mb-12">
                                <div class="service-layout1">
                                    <div class="image-box">
                                        <img src="public-home/images/service-service-4.jpg" alt="image">
                                    </div>
                                    <div class="content-box text-center">
                                        <h3><a href="public-home/#"><?php echo $value['nom_Cheval'] ?></a></h3>
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
            <div class="row">
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
            </div>
        </div>
    </div>
    <!-- Expert Team Area End Here -->



    <footer>
        <div class="footer-area-top accent-bg">
            <div class="container">
                <div class="row">



                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h3 class="title-bar-footer">flickr gallery</h3>
                            <ul class="flickr-photos">
                                <li>
                                    <a href="public-home/#"><img class="img-responsive" src="public-home/images/footer-1.jpg" alt="flickr"></a>
                                </li>
                                <li>
                                    <a href="public-home/#"><img class="img-responsive" src="public-home/images/footer-2.jpg" alt="flickr"></a>
                                </li>
                                <li>
                                    <a href="public-home/#"><img class="img-responsive" src="public-home/images/footer-3.jpg" alt="flickr"></a>
                                </li>
                                <li>
                                    <a href="public-home/#"><img class="img-responsive" src="public-home/images/footer-4.jpg" alt="flickr"></a>
                                </li>
                                <li>
                                    <a href="public-home/#"><img class="img-responsive" src="public-home/images/footer-5.jpg" alt="flickr"></a>
                                </li>
                                <li>
                                    <a href="public-home/#"><img class="img-responsive" src="public-home/images/footer-6.jpg" alt="flickr"></a>
                                </li>

                                <li>
                                    <a href="public-home/#"><img class="img-responsive" src="public-home/images/footer-7.jpg" alt="flickr"></a>
                                </li>
                                <li>
                                    <a href="public-home/#"><img class="img-responsive" src="public-home/images/footer-8.jpg" alt="flickr"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h3 class="title-bar-footer">Recent Posts</h3>
                            <div class="footer-popular-post">
                                <div class="media">
                                    <a href="public-home/#" class="pull-left">
                                        <img alt="Popular" src="public-home/images/footer-8.jpg" class="img-responsive">
                                    </a>
                                    <div class="media-body">
                                        <a href="public-home/#">Pellentesque velit mauris, cursus id eros.</a>
                                        <p>DEEC 23,2021</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h3 class="title-bar-footer">useful link</h3>
                            <ul class="useful-links">
                                <li>
                                    <ul>
                                        <li><a href="public-home/#">About Us</a></li>
                                        <li><a href="public-home/#">Calsses Timetable</a></li>
                                        <li><a href="public-home/#">Popular Classes</a></li>
                                        <li><a href="public-home/#">Shop Product</a></li>
                                        <li><a href="public-home/#">Trainers</a></li>
                                        <li><a href="public-home/#">Recent News</a></li>
                                        <li><a href="public-home/#">Contact Us</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-box">
                            <h3 class="title-bar-footer">contact</h3>
                            <ul class="corporate-address">
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p>Phone: +6789-875-2235</p>
                                    <p>Fax: +2390-875-2235</p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <p>info@example.com</p>
                                    <p>info@example.com</p>
                                </li>
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p>202 New Hampshire Avenue</p>
                                    <p>North #100, New York-2573</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area-bottom accent-bg-light">
            <div class="container">
                <p>&copy; 2022 <span>Horse Riding</span>. All rights reserved</p>
            </div>
        </div>
    </footer>
    <!-- Footer Area End Here -->

    <!-- jquery-->
    <script src="public-home/js/6826-js-jquery-2.2.4.min.js"></script>
    <!-- Plugins js -->
    <script src="public-home/js/2078-js-plugins.js"></script>
    <!-- Bootstrap js -->
    <script src="public-home/js/9144-js-bootstrap.min.js"></script>
    <!-- WOW JS -->
    <script src="public-home/js/8726-js-wow.min.js"></script>
    <!-- Nivo slider js -->
    <script src="public-home/js/js-jquery.nivo.slider.js"></script>
    <script src="public-home/js/slider-home.js"></script>
    <!-- Owl Cauosel JS -->
    <script src="public-home/js/OwlCarousel-owl.carousel.min.js"></script>
    <!-- Meanmenu Js -->
    <script src="public-home/js/5356-js-jquery.meanmenu.min.js"></script>
    <!-- Srollup js -->
    <script src="public-home/js/9-js-jquery.scrollUp.min.js"></script>
    <!-- jquery.counterup js -->
    <script src="public-home/js/5737-js-jquery.counterup.min.js"></script>
    <script src="public-home/js/3086-js-waypoints.min.js"></script>
    <!-- Countdown js -->
    <script src="public-home/js/6767-js-jquery.countdown.min.js"></script>
    <!-- Isotope js -->
    <script src="public-home/js/4952-js-isotope.pkgd.min.js"></script>
    <!-- Magic Popup js -->
    <script src="public-home/js/5189-js-jquery.magnific-popup.min.js"></script>
    <!-- Custom Js -->
    <script src="public-home/js/7812-js-main.js"></script>
    </div>
</body>

</html>