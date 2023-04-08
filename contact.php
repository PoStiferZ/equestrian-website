<?php
$type = 0;
require("public-home/template/header.php");
?>
<!-- Top Bar Space Start-->
<!-- Header Area End Here -->
<!-- Top Bar Space Start-->
<div id="header-area-space"></div>
<!-- Top Bar Space End-->
<!-- Banner Area Start Here -->
<div class="bg-common-style banner-overlay section-space-banner" style="background-image: url(public-home/images/banner2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content-layout2 text-center">
                    <h1>Contacter nous</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End Here -->

<!-- Map Area End Here -->
<!-- info Area End Here -->
<div class="section-space-all">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-title-primary">
                    <h2>Envoyer nous un message</h2>
                </div>
                <div class="contact-form-layout4 text-center">
                    <form action="models/contact/traitement.php" method="POST" id="contact-form">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="top-input" name="nom" placeholder="Votre nom">
                            </div>

                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="top-input" name="prenom" placeholder="Votre prénom">
                            </div>

                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="top-input" name="mail" placeholder="Votre mail">
                            </div>

                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="top-input" name="sujet" placeholder="Votre sujet">
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12 form-group">
                                <textarea placeholder="Commentaire" class="top-input" name="message" id="message" rows="7" cols="20"></textarea>
                            </div>



                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button class="btn-primary-fill-ghost" type="submit" name="send">Envoyer</button>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class='form-response'></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info-layout3 shadow-equal">
                    <div class="title-box">
                        <h2>Informations complémentaires</h2>
                    </div>
                    <ul class="contact-address">
                        <li><i class="bi bi-location-pointer"></i>
                            <p>19 Rue Tulipe</p>
                        </li>
                        <li><i class="bi bi-phone"></i>
                            <p>+33 06 63 23 23 19</p>
                        </li>
                        <li><i class="bi bi-envelop"></i>
                            <p>equestrian@world.com</p>
                        </li>
                    </ul>
                    <p>Nos horaires 08:00 - 21:30</p>

                </div>
            </div>
        </div>
    </div>
</div>



<?php
require("public-home/template/footer.php");
?>