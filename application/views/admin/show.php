<div class="container">
	<h1>Редактировать: 
	<?php if ($table == 'rooms'){ ?>
		<?php  echo 'Номера'; ?> </h1>
		</h1>
		<table class="table table-bordered">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Номер</th>
		      <th scope="col">Описание</th>
		      <th scope="col">Цена</th>
		      <th scope="col">Бесплатно</th>
		      <th scope="col">Платно</th>
		      <th scope="col"> <i class="fa fa-fw fa-wrench"></i> </th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $i = 1; ?>
		  	<?php foreach ($rooms as $room): ?>
		  		<tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $room['type_rus']; ?></td>
			      <td>
			      	<?php 
			      		if (empty($room['describtion'])) {
			      			echo "<i>- <b>Нету описания</b> -</i>";
			      		} else {
			      			echo $room['describtion']; 
			      		}

			      	?>
			      	
			      </td>

			      <td>
			      	<?php echo $room['price']; ?>
			      </td>

			      <td>
			      	<?php echo $room['free_content'];?>
			      </td>

			      <td><?php echo $room['not_free_content']; ?></td>
			      <td><a class="btn btn-warning" href="<?php echo base_url();?>rooms/edit/<?php echo $room['type']; ?>">Изменить <i class="fa fa-fw fa-wrench"></i></a></td>
			    </tr>
			    <?php $i++; ?>
		  	<?php endforeach ?>
		  </tbody>
		</table>
	<?php } else { ?>
		<?php  echo 'Страницы'; ?>
		</h1>
		<table class="table table-bordered">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Страница</th>
		      <th scope="col">Описание</th>
		      <th scope="col">Оссобенности</th>
		      <th scope="col"> <i class="fa fa-fw fa-wrench"></i> </th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php $i = 1; ?>
		  	<?php foreach ($pages as $page): ?>
		  		<tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $page['name_rus']; ?></td>
			      <td>
			      	<?php 
			      		if (empty($page['text'])) {
			      			echo "<i>- <b>Нету описания</b> -</i>";
			      		} else {
			      			echo $page['text']; 
			      		}

			      	?>
			      	
			      </td>
			      <td>
			      	<?php 
			      	
			      		foreach ($points as $point) {

			      			if ($point['page_id'] == $page['id']) {


			      				echo " / ";
			      				echo $point['point_content'];

			      				

			      			} else {
			      				// check to see if there is any points in the database??
			      			}

			      		}

			      	?>
			      	
			      </td>
			      <td><a class="btn btn-warning" href="<?php echo base_url();?>pages/edit/<?php echo $page['name']; ?>">Изменить <i class="fa fa-fw fa-wrench"></i></a></td>
			    </tr>
			    <?php $i++; ?>
		  	<?php endforeach ?>
		  </tbody>
		</table>
	<?php } ?>
</div>