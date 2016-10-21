<div class="container">
    <h2 class="margeTop">Recherche</h2>
    <input type="text" class="form-control" placeholder="Rechercher une manifestation" id="terme" onkeyup="recherche()" autofocus>

    <div class="col-md-12" id="resultats">
        <div id="resultat" style="min-height: 41vh;"></div>
    </div>
    <script>
        function recherche() {
            var terme = $('#terme').val();
            if (terme == '')
            {
                $('#resultat').html('');
            }else{
                // Requette AJAX pour récupérer les manifestations comportant le terme de l'input
                $.ajax({
                    url: '<?php echo base_url(); ?>recherches/getmanifsrecherche',
                    type: 'POST',
                    data: {
                        'terme': terme
                    },
                    success: function (response) {
                        $('#resultat').html('');
                        for (var i = 0; i < response.manifrecherche.length; i++)
                        {
                            <?php $manif = new Manifestations_model(); ?>
                            // Pour chaque manifestation récupéré, création de la div avec toutes les infos récupéré en JSON
                            $('#resultat').append($('<div class="col-md-5 blocManif" id="resul"><a href="<?php echo site_url();?>catalogue/details/' + response.manifrecherche[i].manif_id + '"><h3>' + response.manifrecherche[i].manif_intitul + '</h3><div class="imageManif"><img src="<?php echo site_url();?>public/photos/' + response.manifrecherche[i].manif_photo + '" alt=""></div><div class="main"><p class="text-justify">' + response.manifrecherche[i].manif_description + '</p><p class="text-center prixManif"><strong>' + Math.round((response.manifrecherche[i].manif_prix_place * 1.13)*100)/100 +'$</strong></p><img src="<?php echo base_url();?>catalogue/barre/' + response.manifrecherche[i].manif_id +'" alt="Remplissage de la salle"></div></a></div>').hide().fadeIn(2000));
                        }
                    }
                });
            }
        }
    </script>
</div>
</div>


