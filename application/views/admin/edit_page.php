<div class="container">

	<?php if ($this->session->flashdata('point_added')): ?> 
      <p class="alert alert-success"><?php echo $this->session->flashdata('point_added'); ?></p> 
    <?php endif ?>

    <?php if ($this->session->flashdata('point_deleted')): ?> 
      <p class="alert alert-success"><?php echo $this->session->flashdata('point_deleted'); ?></p> 
    <?php endif ?>

    <?php if ($this->session->flashdata('point_edited')): ?> 
      <p class="alert alert-success"><?php echo $this->session->flashdata('point_edited'); ?></p> 
    <?php endif ?>

    <?php if ($this->session->flashdata('image_deleted')): ?> 
      <p class="alert alert-success"><?php echo $this->session->flashdata('image_deleted'); ?></p> 
    <?php endif ?>
	
	<?php if ($this->session->flashdata('image_added')): ?> 
      <p class="alert alert-success"><?php echo $this->session->flashdata('image_added'); ?></p> 
    <?php endif ?>

    <?php if ($this->session->flashdata('describtion_edited')): ?> 
      <p class="alert alert-success"><?php echo $this->session->flashdata('describtion_edited'); ?></p> 
    <?php endif ?>

    <?php if ($this->session->flashdata('point_error')): ?> 
      <p class="alert alert-danger"><?php echo $this->session->flashdata('point_error'); ?></p> 
    <?php endif ?>

	<h1><?= $title ?> <?= $page->name_rus ?></h1>

	<hr>


		
	
		<?php if ($page->name !== "gallery"): ?>
			<form action="<?php echo base_url(); ?>pages/edit_describtion/<?= $page->id ?>" method="post" style="width: 100%;">

				<h3><label for="">Описание</label></h3>
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<textarea name="describtion" id="editor" rows="5" class="form-control"><?= $page->text ?></textarea>
							<input type="hidden" name="page_name" value="<?php echo $page->name; ?>">
							<input type="hidden" name="page_name_rus" value="<?php echo $page->name_rus; ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="submit" class="btn btn-warning" value="Изменить">
						</div>
					</div>
				</div>

			</form>
			<h3><label for="">
				<?php if($page->name == 'occasions'){
							echo "Возможности";
						}   else {
							echo "Оссобенности";
						}
				?>
			</label></h3>

	
		
				<?php foreach ($points as $point): ?>
				<form action="<?php echo base_url(); ?>pages/edit_point/<?= $point['id'] ?>" method="post" style="width: 100%;">
					<div class="row mb-4">
						<div class="col-md-8">
							<div class="form-group">
							<input type="text" class="form-control" name="point_content" value="<?= $point['point_content']; ?>">
							</div>
						</div>
						<div class="col-md-4">
						
						
						<a href="<?php echo base_url(); ?>pages/delete_point/<?php echo $point['id']."/". $page->name; ?>" class='btn btn-danger'>Delete</a>
						
							<input type="hidden" name="page_name" value="<?php echo $page->name; ?>">
							<input type="hidden" name="page_id" value="<?php echo $page->id; ?>">
							<input type="submit" value="Изменить" class="btn btn-warning">
						</div>
					</div>
					</form>
				<?php endforeach ?>
				<form action="<?php echo base_url(); ?>pages/add_point/<?= $page->id ?>" method="post" style="width: 100%;">
					<h4>
						Добавить 
						<?php if($page->name == 'occasions'){
							echo "возможности";
						}   else {
							echo "оссобенность";
						}

						?>
					</h4>
					<div class="row">

						<div class="col-md-8">
							<div class="form-group pb-5">
							<input type="text" class="form-control" name="point_content">
							<input type="hidden" name="page_name" value="<?php echo $page->name; ?>">
							</div>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
						</div>
					</div>
					</form>
		<?php endif ?>
		
		
	
	<h3><label for="">Фото</label></h3>
		<div class="row pb-3">
			<?php foreach ($images as $image): ?>
				<div class="col-md-3 mb-3">
					<div class="card">
					  <img class="card-img-top" src="<?php echo site_url();?>assets/images/posts/<?php echo $image['url']; ?>" alt="Card image cap">
					  <div class="card-body">
					    <a href="<?php echo base_url(); ?>pages/delete_image/<?php echo $image['id']; ?>" class="btn btn-danger">Delete</a>
					  </div>
					</div>
				</div>
			<?php endforeach ?>
			<div class="col-md-3">
				<div class="card" id="add_card">
					 <img class="card-img-top" src="<?php echo site_url();?>assets/images/posts/noimage.jpg" alt="Card image cap">
					  <div class="card-body">
					    <a href="<?php echo base_url(); ?>upload/index/pages/<?php echo $page->id; ?>" class="btn btn-success"><i class="fa fa-plus"></i> Добавить Фото</i></a>
					  </div>
				</div>
			</div>
		</div>
	
</div>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace( 'editor' );
</script>


<!-- <?= form_open('upload_multiple/index'); ?>
	<input type="hidden" name="table" value='pages'>
	<input type="hidden" name="page_id" value='<?= $page->id ?>'>
	  <img class="card-img-top" src="<?php echo site_url();?>assets/images/posts/<?php echo $image['url']; ?>" alt="Card image cap">
	  <div class="card-body">
	    <button class="btn btn-success" type="submit">Add</button>
	  </div>
	</form> -->