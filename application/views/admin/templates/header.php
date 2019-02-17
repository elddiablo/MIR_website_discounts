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
  <div id="loading">
    <div class="load-circle"><span class="one"></span></div>
  </div>
  <!-- / -->

  <!-- Header -->
  <header >
    <nav class="navbar header-nav fixed-top navbar-expand-lg" style="background-color: #eee;">
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="<?= base_url(); ?>">
        <?php if(!empty($user)) {?>
          <?php 
              echo $user;
           ?>    
        <?php } else { ?> 
  
            Admin-Panel
              
        <?php } ?>
        <span class="theme-bg"></span></a>
        <!-- / -->

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarshark" aria-controls="navbarshark" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <!-- / -->

        <!-- Top Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarshark">
          <ul class="navbar-nav">
            <!-- <li><a class="nav-link active" href="index.html#home">Главная</a></li> -->
            <!-- <li><a class="nav-link" href="index.html#contact">Контакты</a></li> -->
            <li>
              <a class="btn btn-theme" href="<?php echo base_url(); ?>home_users">Home</a>
            </li>
            <li>
              <a class="btn btn-theme" href="<?php echo base_url(); ?>admin/logout">Logout <i class="fas fa-sign-out-alt"></i></a>
            </li>


            <!-- <li><a class="nav-link" href="index.html#portfolio">Portfolio</a></li>
            <li><a class="nav-link" href="index.html#team">Our Team</a></li>
            <li><a class="nav-link" href="index.html#blog">Blog</a></li> -->
            
          </ul>
        </div>
        <!-- / -->

      </div><!-- Container -->
    </nav> <!-- Navbar -->
  </header>
  <!-- Header End -->

  

  <!-- Main Start -->
  <main>
      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('logout_successful')): ?>
        <?php echo '<p class="alert alert-success mt-5">'.$this->session->flashdata('logout_successful').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>