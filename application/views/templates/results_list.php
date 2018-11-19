
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
          

