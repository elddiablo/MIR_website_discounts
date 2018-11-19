<!-- Loading circle -->
  <!-- <div id="loading">
    <div class="load-circle"><span class="one"></span></div>
  </div> -->
  <!-- / -->
    <!-- Home Banner Start -->
    <section id="home" class="home-banner" style="background-image: url(<?php echo base_url('assets/img/banner-1.jpg')?>); height: 100vh;">
      <div class="container pt-custom">
      	<div class="row">
      		<?php foreach ($objects as $object): ?>
	            <div class="col-6 col-lg-4"> 
	             <div class="team-box">
	                <div class="team-img">
	                  <img src="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX21584383.jpg" title="" alt="">
	                </div>
	                <div class="team-info">
	                  <h4 class="font-alt"><?= $object['obj_title']; ?></h4>
	                  <p><span><?= $object['obj_short_describtion']; ?></span></p>
	                  <a href="<?= base_url(); ?>objects/view/<?= $object['obj_id']; ?>" class="btn btn-theme mr-4">Обзор</a>
	                    <span>Скидка </span><?php echo $object['obj_discount']; ?><i class="fas fa-percent"></i>
	                </div>
	              </div> 
	            </div>
	          <?php endforeach ?>

	          <div class="col-12 mt-5">
	          		<ul class="pagination justify-content-center">
					    <li class="page-item">
					      <a class="page-link" href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					        <span class="sr-only">Previous</span>
					      </a>
					    </li>

					<?php for ($i = 1; $i <= $num_of_pages; $i++) { ?>
						
						<li class="<?php if($i == $page){echo 'active page-item'; } else {echo 'page-item'; }  ?>"><a class="page-link" href="<?= base_url(). 'search/showAllResults?city_id='.$city_id.'&inst_id='.$inst_id.'&page='.$i?>"><?= $i; ?></a></li>

					<?php  } ?> 
					<li class="page-item">
				      <a class="page-link" href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				        <span class="sr-only">Next</span>
				      </a>
				    </li>
				  </ul>
	          </div>
      	</div>
      </div><!-- container -->
    </section>
    <!-- Home Banner End -->
