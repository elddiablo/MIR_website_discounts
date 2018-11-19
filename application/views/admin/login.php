
  

  <section id="home" class="home-banner" style="background-image: url('../assets/img/banner-1.jpg');">
      <div class="container">
        <div class="row justify-content-center full-screen">
          <div class="col-sm-5">
            <div class="home-text-center">
              <?php if($this->session->flashdata('login_failed')): ?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
              <?php endif; ?>

               <?php if($this->session->flashdata('logout_successful')): ?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('logout_successful').'</p>'; ?>
              <?php endif; ?>


              <div class="card card-login ml-auto mt-5">
              <div class="card-header"><h2 class="font-alt text-center">Вход</h2></div>
              <div class="card-body">
                <?php echo validation_errors(); ?>

                <?php echo form_open('admin/login'); ?>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Логин</label>
                    <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Username" name="username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password">
                  </div>
                <div class="row">
                  <div class="col-6"><a href="<?php echo base_url(); ?>" class="btn btn-theme">На главную</a></div>
                  <div class="col-6"><input type="submit" class="btn btn-success float-right" value="Войти"></div>
                </div>
                  
                </form>
                <!-- <div class="text-center">
                  <a class="d-block small mt-3" href="register.html">Register an Account</a>
                  <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div> -->
              </div>
            </div>

            </div> <!-- home-text-center -->
          </div> <!-- col -->
        </div> <!-- row -->
      </div><!-- container -->
    </section>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

