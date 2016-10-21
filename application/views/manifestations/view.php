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
        var options = {"title":"<?php echo $manifestations_item['manif_intitul']; ?>",
            'width':600,
            'height':400,
            is3D: true};


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>



<div class="container">
    <h1 class="margeTop" style="color: #000"><?php echo $manifestations_item['manif_intitul']; ?></h1>

    <a href="../createPDF" class="btn btn-primary btn-block" target="_blank">Catalogue PDF</a>
    <div class="col-md-12">
            <div class="col-md-5 blocManif">
                    <div class="imageManif">
                        <h3><?php echo ucfirst($manifestations_item['manif_type']).' - '.$manifestations_item['salle_nom']; ?></h3>
                        <img src="<?php echo site_url();?>public/photos/<?php echo $manifestations_item['manif_photo'];?>" alt="">
                    </div>
                    <div class="main">
                        <p class="text-justify"><?php echo $manifestations_item['manif_description']; ?></p>
                    </div>
                    <p class="text-center prixManif"><strong><?php echo $manifestations_item['manif_prix_place'] * 1.13.'$'; ?></strong></p>
                    <p><strong>
                            <?php
                            echo 'Nombre de résa : '.$nbResa = $manif->countReservation($manifestations_item['manif_id']).' Nombre Place : ';
                            echo $nbPlace = $manifestations_item['salle_place_max'];
                            $pourcentage = ($nbResa / $nbPlace) * 100;
                            ?>
                        </strong></p>
                    <?php
                        if ($nbResa == 0)
                        {
                            echo 'Aucune réservation pour le moment';
                        }else
                        {
                            echo '<img src="'.base_url().'catalogue/barre/'.$manifestations_item['manif_id'].'" alt="Remplissage de la salle">';
                        }
                    ?>
            </div>
        <?php
            if ($nbResa > 0)
            {
                echo '<div class="col-md-6"><div id="chart_div"></div></div>';
            }
        ?>

    </div>
</div>