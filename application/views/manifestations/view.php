<?php
$manif = new Manifestations_model();
$infos = $manif->getCamembert($manifestations_item['manif_id']);
?>
<script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            <?php
                foreach ($infos['rows'] as $cle => $val)
                {
                    echo "['".$val['abo_ville']."',".$val['total']."],";
                }
                ?>
        ]);

        // Set chart options
        var options = {'title':'<?php echo $manifestations_item['manif_intitul']; ?>',
            'width':400,
            'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<div class="container">
<h2><?php echo $title; ?></h2>

    <h3><?php echo '<span id="titre">'.$manifestations_item['manif_intitul'].'</span> - '.$manifestations_item['manif_prix_place'] * 1.13.'$ - '.$manifestations_item['manif_type'].' - '.$manifestations_item['salle_nom'].' - '.$manifestations_item['salle_place_max']; ?> places dispo</h3>
    <img src="../../public/photos/<?php echo $manifestations_item['manif_photo'];?>" alt="">
    <div class="main">
        <p><?php echo $manifestations_item['manif_description']; ?></p>
    </div>
    <div class="col-md-6">
        <strong>
            <?php
            echo 'Nombre de résa : '.$nbResa = $manif->countReservation($manifestations_item['manif_id']).' Nombre Place : ';
            echo $nbPlace = $manifestations_item['salle_place_max'];
            $pourcentage = ($nbResa / $nbPlace) * 100;
            ?>
        </strong>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $pourcentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $pourcentage; ?>%;">
                <?php echo round($pourcentage,0); ?>%
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div id="chart_div"></div>
    </div>
</div>