<!DOCTYPE html>
<html lang="fr">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Saint-Pavut</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Etienne Fontaine">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="<?php echo  base_url(); ?>/public/css/bootstrap.css">
    <!-- Style -->
    <link href="<?php echo  base_url(); ?>public/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo  base_url(); ?>public/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="<?php echo  base_url(); ?>public/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="<?php echo  base_url(); ?>public/plugins/Lightbox/dist/css/lightbox.css" rel="stylesheet">
    <link href="<?php echo  base_url(); ?>public/plugins/Icons/et-line-font/style.css" rel="stylesheet">
    <link href="<?php echo  base_url(); ?>public/plugins/animate.css/animate.css" rel="stylesheet">
    <link href="<?php echo  base_url(); ?>public/css/main.css" rel="stylesheet">
    <!-- Icons Font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>/public/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
<!-- Preloader
============================================= -->
<div class="preloader"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/img/logo/logo.png" class="img-responsive" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
            <div class="col-md-8 col-xs-12 nav-wrap">
                <ul class="nav navbar-nav">
                    <!-- Création des liens en fonction de l'adresse du site, définit dans le config.php -->
                    <li><a href="<?php echo base_url(); ?>">Accueil</a></li>
                    <li><a href="<?php echo base_url(); ?>catalogue/pagination/1">Nos manifestations</a></li>
                    <li><a href="<?php echo base_url(); ?>salles">Nos salles</a></li>
                    <li><a href="<?php echo base_url(); ?>recherches">Recherche</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>