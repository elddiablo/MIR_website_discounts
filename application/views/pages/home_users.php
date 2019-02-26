<!-- Loading circle -->
  
  <!-- / -->
    <!-- Home Banner Start -->

  

    <section id="home" class="home-banner" style="background-image: url('<?= base_url(); ?>assets/img/banner-1.jpg');">
      <div class="container">
        <div class="row justify-content-center full-screen">
          <div class="col-md-10">
            <div class="home-text-center text-center feature-box-02">
              <h1 class="font-alt">Company</h1>
              <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h3>
              <div class="btn-bar">
                <a href="index.html#services" class="btn btn-theme">Search</a>
              </div>
            </div> <!-- home-text-center -->
          </div> <!-- col -->
        </div> <!-- row -->
      </div><!-- container -->
    </section>
    <!-- Home Banner End -->

    <!-- About us Start -->
    <section id="aboutus" class="section">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-6">
            <div class="about-left m-b-30px-md">
              <h1 class="font-alt">About MIR</h1>
              <h2 class="font-alt">Lorem Ipsum is simply dummy text of the.</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.</p>
              <p class="m-b-20px">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
              <a href="/home_users" class="btn btn-theme">Read More...</a>
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

    <!-- Service Start -->
    <section id="services" class="section gray-bg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-7">
            <div class="section-title text-center">
              <h2 id="select_spy">Select Country</h2>
              <p>Select one of the countries on the list.</p>
              <div class="select-area mb-3" id="country_select">
                <select class="form-control" name="country_id">
                  <option value="none">None</option>
                  <option value="1">Turkey</option>
                  <option value="2">Ukraine</option>
                  <option value="3">France</option>
                </select>
              </div>    
              <div class="select-area mt-3" id="city_select">

              </div>  
              <div class="select-area mt-3" id="inst_select">
                
              </div>    
              <a onclick="navigateToResults()" href="#" class="btn btn-success mt-3" id="submit_button" type="submit">Search</a>
            </div>

          </div>
        </div> <!-- row -->
    <div id="hide_on_search">
        
        <div class="row mt-2">

          <?php foreach ($most_popular_countires as $country): ?>
            <div class="col-4 mx-auto select-animation">
              <a href="objects/view/<?= $country['object']->obj_id; ?>" style="text-decoration: none; color: #212529;">
                <div class="team-box">
                  <div class="team-img">
                    <img src="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX21584383.jpg" title="" alt="">
                  </div>
                  <div class="team-info">
                    <h4 class="font-alt"><?php echo $country['country']->name; ?></h4>
                    <span><?php echo $country['object']->obj_title; ?></span>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach ?>
           
          </div>
            <div class="text-center">
              <p class="font-alt-custom-heading cstm-background"><i class="flash_animation fas fa-exclamation"></i> Most Popular Objects <i class="flash_animation fas fa-exclamation"></i></p>
            </div>  
          
        </div> 
      </section>
    <!-- Service End -->



    <!-- Our Team -->
    <section class="section">
      <div class="container" id="results">
        <div class="row justify-content-center" id="results_title">
          <div class="col-12 col-md-10 col-lg-7">
            <div class="section-title text-center m-b-80px m-b-60px-md">
              <h2>Search Results</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
            </div>
          </div>
        </div>
        <div id="search_results" class="row">

        </div>
        <div class="row mt-3" id="show_more_results_area">
            <div class="col-sm-6 text-center mx-auto">
              <form action="search/showAllResults" method="get">
                <input type="hidden" name="city_id" value="" id="city_select_more_field">
                <input type="hidden" name="inst_id" value="" id="inst_select_more_field">
                <!-- <a class="btn btn-theme" href="#" id="show_more_results">Больше</a> -->
                <input type="submit" class="btn btn-theme" value="More">
              </form>
              
            </div>
        </div>
        
        <!-- <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center mt-5">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Prev</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav> -->
      </div> 


      
    </section>