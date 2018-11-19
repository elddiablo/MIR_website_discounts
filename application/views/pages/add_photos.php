
<?php if ($is_ajax_successful == false) { ?>
	<section id="home" class="home-banner" style="background-image: url('<?= base_url(); ?>assets/img/banner-1.jpg');">
      <div class="container">
        <div class="row justify-content-center full-screen">
          <div class="col-md-10">
            <div class="home-text-center feature-box-02">
            	<p class="font-alt" style="font-size: 1.7em;">Добавление фотографий к <b>"<?= $obj_title; ?>"</b></p>
            	<hr>
            	<?php echo form_open_multipart('objects/do_upload');?>
            	<div class="row">
            		<div class="col-md-6">
            			
						<div class="upload_field">
							<label id="image_input">
								<i class="fas fa-cloud-upload-alt fa-2x"></i> 
								<span id="inner_text">Выбрать фото</span>
						    	<input type="file" name="userfile[]" class="hidden file">
						    </label> 
						    
						</div>
            		</div>
            		<div class="col-md-6">
            			<a id="add_photo_field" class="btn"><i class="fa fa-plus fa-2x"></i></a>
            		</div>
            	</div>
              

				<div class="additional_uploads row">
					
				</div>

				<br/><br/>
				<input type="hidden" name="obj_id" value="<?= $obj_id; ?>">
				<input type="submit" value="Загрузить фото" class="btn btn-theme"/>

				</form>
            </div>
          </div>
        </div>
      </div>
    </section>
	
<?php } else { ?>


	<script>
		var is_ajax_successful = <?php echo $is_ajax_successful; ?>
		
		console.log(is_ajax_successful);

	</script>

	<section id="home" class="home-banner" style="background-image: url('<?= base_url(); ?>assets/img/banner-1.jpg');">
      <div class="container">
        <div class="row justify-content-center full-screen">
          <div class="col-md-10">
            <div class="home-text-center feature-box-02">
            	<p class="font-alt" style="font-size: 1.7em;">Добавление фотографий к <b>"<?= $obj_title; ?>"</b></p>
            	<hr>
            	<?php echo form_open_multipart('objects/do_upload');?>
            	<div class="row">
            		<div class="col-md-6">
            			
						<div class="upload_field">
							<label id="image_input">
								<i class="fas fa-cloud-upload-alt fa-2x"></i> 
								<span id="inner_text">Выбрать фото</span>
						    	<input type="file" name="userfile[]" class="hidden file">
						    </label> 
						    
						</div>
            		</div>
            		<div class="col-md-6">
            			<a id="add_photo_field" class="btn"><i class="fa fa-plus fa-2x"></i></a>
            		</div>
            	</div>
              

				<div class="additional_uploads row">
					
				</div>

				<br/><br/>
				<input type="hidden" name="obj_id" value="<?= $obj_id; ?>">
				<input type="submit" value="Загрузить фото" class="btn btn-theme"/>

				</form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>$('input.file').change(function() {
  $('#inner_text').remove();
  $(this).toggleClass('hidden');
});

$('#add_photo_field').click(function() {
  $('.additional_uploads').append("<div class='col-md-6'><label id='image_input'><i class='fas fa-cloud-upload-alt fa-2x'></i><input type='file' name='userfile[]'></label></div>");
});</script>



<?php } ?>
