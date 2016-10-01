<div class="container">
    <h2><?php echo $title; ?></h2>
    <input type="text" class="form-control" placeholder="Rechercher une manifestation" id="terme" onkeyup="recherche()" autofocus>

    <div class="col-md-12" id="resultats">
        <div class="col-md-6" id="resultat"></div>
    </div>
    <script>
        function recherche() {
            var terme = $('#terme').val();
            if (terme == '')
            {
                $('#resultat').html('');
            }else{
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
                            $('#resultat').append('<div class="col-md-6" style="height: 620px"><h3>' + response.manifrecherche[i].manif_intitul + '</h3><img src="<?php echo site_url();?>public/photos/' + response.manifrecherche[i].manif_photo + '" alt=""><div class="main">' + response.manifrecherche[i].manif_description + '</div><a href="<?php echo site_url();?>manifestations/details/' + response.manifrecherche[i].manif_id + '">Détails</a></div>');
                        }
                    }
                });
            }
        }
    </script>
</div>
</div>


