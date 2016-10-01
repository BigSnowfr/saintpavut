<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo  base_url(); ?>/public/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>/public/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Saint-Pavut</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>">Saint-Pavut</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>">Accueil</a></li>
                <li><a href="<?php echo base_url(); ?>manifestations/pagination/1">Nos manifestations</a></li>
                <li><a href="<?php echo base_url(); ?>salles">Nos salles</a></li>
                <li><a href="<?php echo base_url(); ?>recherches">Recherche Ajax</a></li>
            </ul>
        </div>
    </div>
</nav>