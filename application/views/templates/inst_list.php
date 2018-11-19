
	<select class="form-control" name="inst_id" id="inst_select_input">
		<option value="none">Предприятия</option>
	<?php foreach ($insts as $inst): ?>
		<option value="<?php echo $inst['id']; ?>">
			<?php echo $inst['name']; ?>
		</option>
	<?php endforeach ?>  
	</select>

