<div class="container">
<h2><?php echo $title; ?></h2>
<div class="row">
    <?php foreach ($salles as $salle): ?>
    <div class="col-md-6">
        <h3><?php echo $salle['salle_nom'].' - '.$salle['salle_code']; ?></h3>
    <div class="main">
        <?php echo 'Surface : '.$salle['salle_surface'].' - Place : '.$salle['salle_place_max']. ' - Nombre de m2 par place : '.round($salle['salle_surface']/$salle['salle_place_max']); ?>
    </div>
</div>
<?php endforeach; ?>
</div>
</div>