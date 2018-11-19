<div class="row">
	<div class="col-12">
			
			<?php for ($i = 0; $i < count($errors); $i++) {
				?>
				<div class="alert alert-danger alert-dismissible fade show p-1 mb-2">
						<?php echo $errors[$i] . "<br>"; ?>
					<button type="button" class="close custom-danger-alert"  data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
				  	</button>
				</div>
				

			<?php } ?>
			
			
		</h2>
	</div>
</div>