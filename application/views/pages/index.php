
<!-- Header
============================================= -->
<section class="main-header" style="margin-top: -21px;">
    <div id="owl-hero" class="owl-carousel owl-theme">
        <div class="item" style="background-image: url(<?php echo base_url(); ?>public/img/sliders/Slide.jpg)">
            <div class="caption">
                <h6>Concerts / Théâtres / Conférences</h6>
                <h1>Nous sommes <span>Saint-Pavut</span></h1>
                <a class="btn btn-transparent" href="<?php echo base_url(); ?>salles">Nos salles</a><a class="btn btn-light" href="<?php echo base_url(); ?>catalogue/pagination/1">Nos manifestations</a>
            </div>
        </div>
        <div class="item" style="background-image: url(<?php echo base_url(); ?>public/img/sliders/Slide2.jpg)">
            <div class="caption">
                <h6>Concerts / Théâtres / Conférences</h6>
                <h1>Nous sommes <span>Saint-Pavut</span></h1>
                <a class="btn btn-transparent" href="<?php echo base_url(); ?>salles">Nos salles</a><a class="btn btn-light" href="<?php echo base_url(); ?>catalogue/pagination/1">Nos manifestations</a>
            </div>
        </div>
        <div class="item" style="background-image: url(<?php echo base_url(); ?>public/img/sliders/Slide3.jpg)">
            <div class="caption">
                <h6>Concerts / Théâtres / Conférences</h6>
                <h1>Nous sommes <span>Saint-Pavut</span></h1>
                <a class="btn btn-transparent" href="<?php echo base_url(); ?>salles">Nos salles</a><a class="btn btn-light" href="<?php echo base_url(); ?>catalogue/pagination/1">Nos manifestations</a>
            </div>
        </div>
    </div>
</section>

<!-- Welcome
============================================= -->
<section id="welcome">
    <div class="container">
        <h2>Bienvenue chez <span>Saint-Pavut</span></h2>
        <hr class="sep">
        <p>Passez d'agréables soirées</p>
        <img class="img-responsive center-block wow fadeInUp" data-wow-delay=".3s" src="<?php echo base_url(); ?>public/img/welcome/logo.png" alt="logo">
    </div>
</section>

<!-- Services
============================================= -->
<section id="services">
    <div class="container">
        <h2>Qui sommes-nous ?</h2>
        <hr class="light-sep">
        <p>Un large choix de sorties</p>
        <div class="services-box">
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-md-4">
                    <div class="media-left"><span class="icon-lightbulb"></span></div>
                    <div class="media-body">
                        <h3>Théâtre</h3>
                        <p>Pièces classiques, contemporaines ou modernes, venez profiter d'un loisir diversifié.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media-left"><span class="icon-mobile"></span></div>
                    <div class="media-body">
                        <h3>Conférence</h3>
                        <p>Art, musique, voyage, des conférences variées vous sont proposées.</p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="media-left"><span class="icon-compass"></span></div>
                    <div class="media-body">
                        <h3>Concert</h3>
                        <p>Classique, Jazz, Gospel, nous avons forcément des concerts à votre goût.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio
============================================= -->
<section id="portfolio">
    <div class="container-fluid">
        <h2>Quelques pièces</h2>
        <hr class="sep">
        <p>6 spectacles au hasard</p>
        <div class="row">
            <!-- Affichage des 6 manifestations récupérées aléatoirement -->
            <?php foreach ($manifestations as $manifestation) : ?>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                <a class="portfolio-box" href="<?php echo site_url();?>public/photos/<?php echo $manifestation->manif_photo;?>" data-lightbox="image-1" data-title="<?php echo $manifestation->manif_intitul; ?>">
                    <img src="<?php echo site_url();?>public/photos/<?php echo $manifestation->manif_photo;?>" class="photoRandom" alt="1">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <?php echo ucfirst($manifestation->manif_type); ?>
                            </div>
                            <div class="project-name">
                                <?php echo $manifestation->manif_intitul; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Some Fune Facts
============================================= -->
<section id="fun-facts">
    <div class="container">
        <h2>Quelques chiffres </h2>
        <hr class="light-sep">
        <div class="row wow fadeInUp" data-wow-delay=".3s">
            <div class="col-lg-3">
                <span class="icon-happy"></span>
                <h2 class="number timer">367</h2>
                <h4>Clients satisfaits</h4>
            </div>
            <div class="col-lg-3">
                <span class="icon-presentation"></span>
                <h2 class="number timer">150</h2>
                <h4>Spectacles proposés</h4>
            </div>
            <div class="col-lg-3">
                <span class="icon-wine"></span>
                <h2 class="number timer">1201</h2>
                <h4>Coupes de Champagne servies</h4>
            </div>
            <div class="col-lg-3">
                <span class="icon-documents"></span>
                <h2 class="number timer">20</h2>
                <h4>Spectacles actuellement proposés</h4>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials
============================================= -->
<section id="testimonials">
    <div class="container">
        <h2>Témoignages</h2>
        <hr class="light-sep">
        <p>Ce que les spectateurs pensent de nous</p>
        <div id="owl-testi" class="owl-carousel owl-theme">
            <div class="item">
                <div class="quote">
                    <i class="fa fa-quote-left left fa-2x"></i>
                    <h5>J'ai passé une superbe soirée grâce au large choix de spectacles proposés sur <span>Saint-Pavut</span>.<i class="fa fa-quote-right right fa-2x"></i></h5>

                </div>
            </div>
            <div class="item">
                <div class="quote">
                    <i class="fa fa-quote-left left fa-2x"></i>
                    <h5>Je suis vraiment surpris de la qualité des pièces proposées sur <span>Saint-Pavut</span>.<i class="fa fa-quote-right right fa-2x"></i></h5>

                </div>
            </div>
            <div class="item">
                <div class="quote">
                    <i class="fa fa-quote-left left fa-2x"></i>
                    <h5>Je n'hésiterai pas à parler de <span>Saint-Pavut</span> à mes amis.<i class="fa fa-quote-right right fa-2x"></i></h5>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Google Map
============================================= -->
<div id="map"></div>