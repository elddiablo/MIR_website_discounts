<!-- jQuery -->
  <script src="<?= base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery-migrate-3.0.0.min.js"></script>

  <!-- Plugins -->
  <script src="<?= base_url(); ?>assets/plugin/bootstrap/js/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/owl-carousel/js/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/isotope/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/magnific/jquery.magnific-popup.min.js"></script>

  <!-- custom -->
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>
  <script src="<?= base_url(); ?>assets/js/admin/custom.js"></script>
  <script src="<?= base_url(); ?>assets/js/create-form.js"></script>

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



