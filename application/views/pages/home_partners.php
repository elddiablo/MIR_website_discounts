
    <!-- Home Banner Start -->
    <section id="home" class="home-banner" style="background-image: url('<?= base_url(); ?>assets/img/banner-1.jpg');">
      <div class="container">
        <div class="row justify-content-center full-screen">
          <div class="col-md-10">
            <div class="home-text-center text-center feature-box-02">
              <?php if ($this->session->flashdata('object_created')): ?> 
                <p class="alert alert-success"><?php echo $this->session->flashdata('object_created'); ?></p> 
              <?php endif ?>
              <h1 class="font-alt">Название</h1>
              <h3 class="font-alt">Чтобы начать <b>Партнерство</b> с нами, Ознакомтесь с <b>Правилами</b> ниже <br>
Если у вас уже есть <b>Объекты</b>, войдите в <b>учетную запись</b></h3>
              <div class="btn-bar">
                <a href="index.html#aboutus" class="btn btn-theme">Правила</a>
                <a href="<?= base_url(); ?>users/login" class="btn btn-theme">вход</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Home Banner End -->


    <!-- About us Start -->
    <section id="aboutus" class="section">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-6">
            <div class="about-left m-b-30px-md">
              <h1 class="font-alt">Правила</h1>
              <h2 class="font-alt">Lorem Ipsum is simply dummy text of the.</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.</p>
              <p class="m-b-20px">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
              <a href="/objects/create_object" class="btn btn-theme">Создать объект</a>
            </div> 
          </div>
          <div class="col-md-6">
            <img src="assets/img/2.jpg" title="" alt="" />
          </div>
        </div>

        <div class="about-feacher">
        <div class="row">
          <div class="col-12 col-md-4">
            <div class="feature-box">
              <i class="icon ti-ruler-pencil"></i>
              <div class="feature-content">
                <h5>Development</h5>
                <p>Lorem Ipsum is simply text of the printing and typesetting industry.</p>
              </div>
            </div>
          </div> 

          <div class="col-12 col-md-4">
            <div class="feature-box">
              <i class="icon ti-image"></i>
              <div class="feature-content">
                <h5>Graphic</h5>
                <p>Lorem Ipsum is simply text of the printing and typesetting industry.</p>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-4">
            <div class="feature-box">
              <i class="icon ti-layout"></i>
              <div class="feature-content">
                <h5>Web Design</h5>
                <p>Lorem Ipsum is simply text of the printing and typesetting industry.</p>
              </div>
            </div>
          </div>
        </div>
        </div>

      </div>
    </section>
    <!-- About us end -->

    <!-- Counter Start -->
    <!-- <section class="section counter-box" style="background-image: url('<?= base_url(); ?>assets/img/overlay-5.png');">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 col-sm-6 wow fadeInLeft">
                    <div class="counter-col">
                        <div class="counter-data" data-count="375">
                            <i class="ti-face-smile"></i>
                            <div class="count font-alt">375</div>
                            <h6>Happy Clients</h6>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-sm-6 wow fadeInLeft">
                    <div class="counter-col">
                        <div class="counter-data" data-count="375">
                            <i class="ti-headphone"></i>
                            <div class="count font-alt">375</div>
                            <h6>Telephonic Talk</h6>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-sm-6 wow fadeInLeft">
                    <div class="counter-col">
                        <div class="counter-data" data-count="550">
                            <i class="ti-camera"></i>
                            <div class="count font-alt">550</div>
                            <h6>Photo Capture</h6>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-sm-6 wow fadeInLeft">
                    <div class="counter-col">
                        <div class="counter-data" data-count="450">
                            <i class="ti-thumb-up"></i>
                            <div class="count font-alt">450</div>
                            <h6>Project Completed</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Counter End -->


    <!-- Contact Start -->


      <!-- <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-7">
            <div class="section-title text-center m-b-60px">
              <h2 id="select_spy">Выберите Страну</h2>
              <p>Выберите одну из предоставленных стран в списке.</p>
              <div class="select-area mb-3" id="country_select">
                <select class="form-control" name="country_id">
                  <option value="none">Страна</option>
                  <option value="1">Турция</option>
                  <option value="2">Украина</option>
                  <option value="3">Франция</option>
                </select>
              </div>    
              <div class="select-area mt-3" id="city_select">

              </div>  
              <div class="select-area mt-3" id="inst_select">
                
              </div>    
              <a href="index.html#results" class="btn btn-success mt-3" id="submit_button" type="submit">Поиск</a>
            </div>

          </div>
        </div> 
        
      </div> --> 


      


    <!-- / -->


