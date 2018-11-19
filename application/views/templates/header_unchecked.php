<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Page Title -->
  <title>SomeTitle</title>
  <!-- / -->

  <!---Font Icon-->
  <link href="<?= base_url(); ?>assets/plugin/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/plugin/themify-icons/themify-icons.css" rel="stylesheet">
  <!-- / -->

  <!-- Plugin CSS -->
  <link href="<?= base_url(); ?>assets/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/plugin/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/plugin/magnific/magnific-popup.css" rel="stylesheet">
  <!-- / -->

  <!-- Theme Style -->
  <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/color/default.css" rel="stylesheet" id="color_theme">
  <!-- / -->

  <!-- Favicon -->
  <link rel="icon" href="favicon.ico" />
  <!-- / -->

</head>

<!-- Body Start -->
<body data-spy="scroll">

  <!-- Loading -->
  <!-- <div id="loading">
    <div class="load-circle"><span class="one"></span></div>
  </div> -->
  <!-- / -->

  <!-- Header -->
  <header>
    <nav class="navbar header-nav fixed-top navbar-expand-lg">
      <div class="container">
        <!-- Brand -->
        <a class="btn btn-theme" href="<?php echo base_url(); ?>admin"><i class="fas fa-arrow-alt-circle-left fa-lg"></i> Back</a>

        <div class="flex">
          <div class="justify-content-end">
            <a href="#" class="btn btn-theme">Preview</a>
          </div>
        </div>
        <!-- / -->

        <!-- Mobile Toggle -->
       <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarshark" aria-controls="navbarshark" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button> -->
        <!-- / -->

        <!-- Top Menu -->
        <!-- / -->

      </div><!-- Container -->
    </nav> <!-- Navbar -->
  </header>
  <!-- Header End -->

  

  <!-- Main Start -->
  <main>
      <!-- Flash messages -->
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
      <?php endif; ?>

      

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>