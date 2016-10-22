<div class="container">
<h2 class="margeTop"><?php echo $title // On indique le titre de la page; ?></h2>
    <div class="col-md-8 col-md-offset-2 text-center">
        <div class="table-responsive">
        <table border="1" class="tableSalle">
            <tr class="tableHead">
                <td>Nom</td>
                <td>Code</td>
                <td>Surface m²</td>
                <td>Nombre de place</td>
                <td>m² par place</td>
            </tr>
        <?php foreach ($salles as $salle): // On parcours toutes les manifs contenu dans $salle?>
            <tr>
                <td><?php echo $salle->salle_nom; ?></td>
                <td><?php echo $salle->salle_code; ?></td>
                <td><?php echo $salle->salle_surface; ?></td>
                <td><?php echo $salle->salle_place_max; ?></td>
                <td><?php echo round($salle->salle_surface/$salle->salle_place_max); // On affiche le m2 par place et on l'arrondi?></td>
            </tr>
        <?php endforeach; ?>
        </table>
        </div>
    </div>
</div>
</div>