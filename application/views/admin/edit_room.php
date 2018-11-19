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

	<h1><?= $title ?> <?= $room->type_rus ?></h1>

	<hr>

	

			<form action="<?php echo base_url(); ?>rooms/edit_describtion/<?= $room->id ?>" method="post" style="width: 100%;">

				<h3><label for="">Описание</label></h3>
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<textarea name="describtion" id="editor" rows="5" class="form-control"><?= $room->describtion ?></textarea>
							<input type="hidden" name="room_type" value="<?php echo $room->type; ?>">
							<input type="hidden" name="room_type_rus" value="<?php echo $room->type_rus; ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="submit" class="btn btn-warning" value="Изменить">
						</div>
					</div>
				</div>

			</form>

			<form action="<?php echo base_url(); ?>rooms/edit_price/<?= $room->id ?>" method="post" style="width: 100%;">

				<h3><label for="">Цена</label></h3>
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<input name="price" class="form-control" value = "<?= $room->price ?>">
							<input type="hidden" name="room_type" value="<?php echo $room->type; ?>">
							<input type="hidden" name="room_type_rus" value="<?php echo $room->type_rus; ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="submit" class="btn btn-warning" value="Изменить">
						</div>
					</div>
				</div>

			</form>

			<form action="<?php echo base_url(); ?>rooms/edit_free_content/<?= $room->id ?>" method="post" style="width: 100%;">

				<h3><label for="">Бесплатно</label></h3>
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<textarea name="free_content" id="editor1" rows="5" class="form-control"><?= $room->free_content ?></textarea>
							<input type="hidden" name="room_type" value="<?php echo $room->type; ?>">
							<input type="hidden" name="room_type_rus" value="<?php echo $room->type_rus; ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="submit" class="btn btn-warning" value="Изменить">
						</div>
					</div>
				</div>

			</form>

			<form action="<?php echo base_url(); ?>rooms/edit_not_free_content/<?= $room->id ?>" method="post" style="width: 100%;">

				<h3><label for="">Платно</label></h3>
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<textarea name="not_free_content" id="editor2" rows="5" class="form-control"><?= $room->not_free_content ?></textarea>
							<input type="hidden" name="room_type" value="<?php echo $room->type; ?>">
							<input type="hidden" name="room_type_rus" value="<?php echo $room->type_rus; ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="submit" class="btn btn-warning" value="Изменить">
						</div>
					</div>
				</div>

			</form>

	
		
				
				
		
		
	
	<h3><label for="">Фото</label></h3>
		<div class="row pb-3">
			<?php foreach ($images as $image): ?>
				<div class="col-md-3 mb-3">
					<div class="card">
					  <img class="card-img-top" src="<?php echo site_url();?>assets/images/posts/<?php echo $image['url']; ?>" alt="Card image cap">
					  <div class="card-body">
					    <a href="<?php echo base_url(); ?>rooms/delete_image/<?php echo $image['id']; ?>" class="btn btn-danger">Delete</a>
					  </div>
					</div>
				</div>
			<?php endforeach ?>
			<div class="col-md-3">
				<div class="card" id="add_card">
					 <img class="card-img-top" src="<?php echo site_url();?>assets/images/posts/noimage.jpg" alt="Card image cap">
					  <div class="card-body">
					    <a href="<?php echo base_url(); ?>upload/index/rooms/<?php echo $room->id; ?>" class="btn btn-success"><i class="fa fa-plus"></i> Добавить Фото</i></a>
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
	CKEDITOR.replace( 'editor1' );
	CKEDITOR.replace( 'editor2' );
</script>


<!-- <?= form_open('upload_multiple/index'); ?>
	<input type="hidden" name="table" value='rooms'>
	<input type="hidden" name="room_id" value='<?= $room->id ?>'>
	  <img class="card-img-top" src="<?php echo site_url();?>assets/images/posts/<?php echo $image['url']; ?>" alt="Card image cap">
	  <div class="card-body">
	    <button class="btn btn-success" type="submit">Add</button>
	  </div>
	</form> ?> -->