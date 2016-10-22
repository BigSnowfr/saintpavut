<!-- Footer
============================================= -->
<footer>
    <div class="container">
        <h1>Saint-Pavut</h1>
        <h6>&copy; <span id="annee"></span> Etienne Fontaine</h6>
        <script>
            // On insère l'année en cours
            var aujd = new Date();
            var année = aujd.getFullYear();
            $('#annee').text(année);
        </script>
    </div>
</footer>
<!-- jQuery 1.11 en CDN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>public/bootstrap-assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/custom.js"></script>
<!-- JS PLUGINS -->
<script src="<?php echo base_url(); ?>public/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/countTo/jquery.countTo.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/inview/jquery.inview.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/Lightbox/dist/js/lightbox.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/WOW/dist/wow.min.js"></script>
<!-- GOOGLE MAP -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8VaTW0r1Fmz2RoKuqKCcZkPO9jacDTDo"></script>
</body>

</html>