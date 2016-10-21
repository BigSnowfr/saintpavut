<div class="container">
<h2 class="margeTop">Nos manifestations</h2>

    <?php
    // Si on est sur la page paginé, on affiche un lien pour afficher toutes les manifestations
    if ($this->pagination->create_links())
    {
        echo $this->pagination->create_links();
        echo '<h3><a href="'.base_url().'catalogue">Tout voir</a></h3>';
        // On affiche un lien pour télécharger le PDF des manifestations
        echo '<a href="../createPDF" class="btn btn-primary btn-block" target="_blank">Catalogue PDF</a>';
    // Si on est sur la page avec toutes les manifestations on affiche un lien pour aller sur la vue paginée
    }else
    {
        echo '<h3><a href="'.base_url().'catalogue/pagination/1">Vue paginée</a></h3>';
        // On affiche un lien pour télécharger le PDF des manifestations
        echo '<a href="./catalogue/createPDF" class="btn btn-primary btn-block" target="_blank">Catalogue PDF</a>';
    }
    ?>
    <div class="col-md-12">
        <!-- On affiche la présentation de chaque manifestations-->
        <?php foreach ($manifestations as $manifestation): ?>
                <div class="col-md-5 blocManif">

                    <a href="<?php echo site_url().'catalogue/details/'.$manifestation['manif_id']; ?>">
                <h3><?php echo '<span id="titre">'.$manifestation['manif_intitul']; ?></span></h3>
                <div class="imageManif">
                    <h3><?php echo ucfirst($manifestation['manif_type']).' - '.$manifestation['salle_nom']; ?></h3>
                    <img src="<?php echo site_url();?>public/photos/<?php echo $manifestation['manif_photo'];?>" alt="">
                </div>
                <div class="main">
                    <p class="text-justify"><?php echo $manifestation['manif_description']; ?></p>
                </div>
                    <p class="text-center prixManif"><strong><?php echo $manifestation['manif_prix_place'] * 1.13.'$'; ?></strong></p>
                        <p><strong>
                    <?php
                        $manif = new Manifestations_model();
                        echo 'Nombre de réservation : '.$nbResa = $manif->countReservation($manifestation['manif_id']);
                        echo '<br>Nombre place dans la salle : '.$nbPlace = $manifestation['salle_place_max'];
                        $pourcentage = ($nbResa / $nbPlace) * 100;
                    ?></strong></p>

                        <?php
                        // On test si la manifestation à déjà des réservation, si elle n'en a pas on affiche pas l'image
                        if ($nbResa == 0)
                        {
                            echo 'Aucune réservation pour le moment';
                        }else
                        {
                            echo '<img src="'.base_url().'catalogue/barre/'.$manifestation['manif_id'].'" alt="Remplissage de la salle">';
                        }
                        ?>
                    </a>
                </div>
    <?php endforeach; ?>
    </div>
    <!-- On affiche le système de navigation pour la pagination -->
    <?php echo $this->pagination->create_links(); ?>
</div>