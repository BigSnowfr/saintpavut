<div class="container">
<h2><?php echo $title; ?></h2>

    <a href="../createPDF" class="btn btn-primary btn-block" target="_blank">PDF</a>
    <?php echo $this->pagination->create_links(); ?>
    <div class="col-md-12">

<?php foreach ($manifestations as $manifestation): ?>
    <div class="col-md-6" style="height: 620px">
    <h3><?php echo '<span id="titre">'.$manifestation['manif_intitul'].'</span> - '.$manifestation['manif_prix_place'] * 1.13.'$ - '.ucfirst($manifestation['manif_type']).' - '.$manifestation['salle_nom']; ?></h3>
    <img src="<?php echo site_url();?>public/photos/<?php echo $manifestation['manif_photo'];?>" alt="">
    <div class="main">
        <?php echo $manifestation['manif_description']; ?>
    </div>
    <strong>
        <?php
            $manif = new Manifestations_model();
            echo 'Nombre de résa : '.$nbResa = $manif->countReservation($manifestation['manif_id']).' Nombre Place : ';
            echo $nbPlace = $manifestation['salle_place_max'];
            $pourcentage = ($nbResa / $nbPlace) * 100;
        ?></strong>
    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $pourcentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $pourcentage; ?>%;">
            <?php echo round($pourcentage,0); ?>%
        </div>
    </div>
        <a href="<?php echo site_url().'manifestations/details/'.$manifestation['manif_id']; ?>">Détails</a>
    </div>
<?php endforeach; ?>
</div>
    </div>