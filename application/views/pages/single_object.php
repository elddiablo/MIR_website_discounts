
<section id="single_object" class="section mt-5">
      <div class="container">
          <div class="row justify-content-center align-items-center py-3" style="-webkit-box-shadow: 0px 0px 28px -7px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 28px -7px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 28px -7px rgba(0,0,0,0.75);">
            <div class="col-md-6">
             <!--  <img src="assets/img/2.jpg" title="" alt="" /> -->
             <div class="owl-carousel">
                <?php foreach ($images as $image): ?>
                  <img src="<?= base_url(); ?>assets/uploaded_images/<?= $image['image_name'] ?>" title="" alt="" class="img-fluid"/>
                <?php endforeach ?>
                  
              </div>
            </div>
          <div class="col-md-6">
            <div class="about-left m-b-30px-md">
              <h1 class="font-alt"><?php echo $object->obj_title; ?> - <button class="btn btn-danger">Discount <?php echo $object->obj_discount; ?>%</button></h1>
              <h2 class="font-alt single-object_type"><?php echo $object_type; ?></h2>
              <p class="single-object_short_describition"><?php echo $object->obj_short_describtion; ?></p>
              <p class="m-b-20px"><?php echo $object->obj_describtion; ?></p>
              <a href="index.html#send_message" class="btn btn-theme">Get Discount</a>
            </div> 
          </div>
          
        </div>

        <div class="about-feacher">
        <div class="row">
          <div class="col-12 col-md-4">
            <div class="feature-box">
              <i class="icon far fa-address-book"></i>
              <div class="feature-content">
                <h5 class='font-alt'>Contacts</h5>
                <?php foreach ($phones as $phone): ?>
                  <div class="contact pb-2">
                    <p class="font-alt">Name: <?php echo $phone['phone_name']; ?></p>
                    <a class='font-alt' href="tel:<?php echo $phone['phone_number']; ?>"><?php echo $phone['phone_number']; ?></a>
                    
                  
                <?php endforeach ?>
                <?php if ($phones): ?>
                    </div>
                <?php endif ?>
                <a href="mailto: <?= $object->obj_owner_email; ?>"><?= $object->obj_owner_email; ?></a>
                
              </div>
            </div>
          </div> 

          <div class="col-12 col-md-4">
            <div class="feature-box">
              <i class="icon far fa-map"></i>
              <div class="feature-content">
                <h5 class='font-alt'>Adress</h5>
                <p class="font-alt"><?php echo $object->obj_location; ?></p>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-4">
            <div class="feature-box">
              <!-- <i class="icon ti-layout"></i> -->
              <i class="icon fas fa-columns"></i>
              <div class="feature-content">
                <h5 class='font-alt'>Website</h5>
                <a href="http://<?php echo $object->obj_website_url; ?>" class='font-alt'><?php echo $object->obj_title; ?>.com</a>
              </div>
            </div>
          </div>
        </div>
        </div>

      </div>
    </section>

    <section id="send_message" class="section gray-bg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-7">
            <div class="section-title text-center m-b-60px m-b-70px-md">
              <h2 class="font-alt">Recieve discount!</h2>
              <p class="font-alt">All you need to do <br>is type in your email and name.</p>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-12 col-lg-5 col-md-8 col-sm-10">
            <div class="contact-form white-bg m-b-30px-md">
              <form action="/objects/get_discount" method="post">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <input type="hidden" name="object_id" value="<?= $object->obj_id; ?>">
                    <input name="name" placeholder="Name" class="form-control" type="text">
                  </div>  
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <input name="email" placeholder="Email" class="form-control" type="email">

                  </div>  
                </div>
                <div class="col-12 pt-3 text-center">
                    <input type="submit" class="btn btn-theme" value="Get">
                </div>
              </div>
              </form>
            </div>
          </div> 

          <!-- <div class="col-12 col-lg-6">
            <div class="contact-map">
              <div class="embed-responsive embed-responsive-16by9 h-400px">
                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3151.840107317064!2d144.955925!3d-37.817214!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0:0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1520156366883" allowfullscreen=""></iframe>
              </div>
            </div>
          </div> -->

        </div>
      </div>
    </section>
    