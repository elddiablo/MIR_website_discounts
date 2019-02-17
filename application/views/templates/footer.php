
  
  <!-- Plugins -->
  <script src="<?= base_url(); ?>assets/plugin/bootstrap/js/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/isotope/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/magnific/jquery.magnific-popup.min.js"></script>

  <!-- custom -->
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>

  <script>
      $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            dots: true,
            autoHeight:true
          });
      });
    </script>



