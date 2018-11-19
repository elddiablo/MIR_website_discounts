
	<select class="form-control" name="city_id" id="city_select_input">
		<option value="none">Город</option>
	<?php foreach ($cities as $city): ?>
		<option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
	<?php endforeach ?>  
	</select>

