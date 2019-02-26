<!-- Button trigger modal -->
<!-- Large modal -->
<div class="m-t-70px">
    <?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>
    <div class="row">

        <?php if (!empty($objects_unchecked)): ?>
            <div class="col-sm-12 mt-5" id="unchecked_objects">
            <div class="container">
                <h2 class="font-alt">Unchecked Objects</h2>
            </div>
            <hr>
            <table class="table table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">№</th>
                  <th scope="col">Страна</th>
                  <th scope="col">Город</th>
                  <th scope="col">Тип</th>
                  <th scope="col">Назв.</th>
                  <th scope="col">Описание</th>
                  <th scope="col">Скидка</th>
                  <th scope="col">Кол-во фото</th>
                  <th scope="col"> <i class="fa fa-fw fa-wrench"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($objects_unchecked as $object): ?>
                    <?php $object_i_id = array(

                        'obj_id' => $object['obj_id'],
                        'obj_i' => $i

                    ); ?>
                    <tr class="object_<?= $object['obj_id']; ?> unchecked_object">
                        <td><?= $i; ?></td>
                        <td><?= $this->object_model->get_object_prop("country", $object['obj_country_id'])->name; ?></td>
                        <td><?= $this->object_model->get_object_prop("city", $object['obj_city_id'])->name; ?></td>
                        <td><?= $this->object_model->get_object_prop("inst", $object['obj_inst_id'])->name_single; ?></td>
                        <td><?= $object['obj_title']; ?></td>
                        <td><?= $object['obj_short_describtion']; ?></td>
                        <td><?= $object['obj_discount']; ?>%</td>
                        <td><?= $this->object_model->get_object_num_of_images($object['obj_id']); ?></td>
                        <td>
                            <!-- Submit -->
                            <button style="border: none; background:none;cursor: pointer;color:green;" value="<?php echo $object['obj_id']; ?>" class="submit_button">
                                <i class="far fa-check-square fa-lg"></i>
                            </button>

                            
                            <!-- Delete -->
                            <button style="border: none; background:none;cursor: pointer;color:red;" value="<?php echo $object['obj_id']; ?>" class="delete_button">
                                <i class="fas fa-times fa-lg "></i>
                            </button> 

                            
                            <!-- Preview -->
                            <a class="preview_button px-2" href="/objects/view/<?= $object['obj_id']; ?>" style="cursor: pointer; color: blue;">
                                <i class="fas fa-paper-plane"></i>
                            </a>
                        </td>
                    </tr>

                    <?php $i ++; ?>
                <?php endforeach ?>
              </tbody>
            </table>
        </div>
        <?php endif ?>

        <div class="col-sm-12 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-6 p-0">
                        <h2 class="font-alt">All Objects</h2>
                    </div>
                    <?php if ( !$isAdmin && (empty($objects) || (count($objects) < 3)) || $isAdmin): ?>
                        <div class="col-6 p-0">
                            <a data-toggle="modal" data-target=".bd-example-modal-lg" class="float-right mt-2" id="add_object_user_button">
                                <i class="fas fa-plus-circle fa-2x"></i>
                            </a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <hr>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Страна</th>
                        <th scope="col">Город</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Назв.</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Скидка</th>
                        <th scope="col">Кол-во фото</th>
                        <th scope="col"> <i class="fa fa-fw fa-wrench"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($objects as $object): ?>
                    <?php $object_i_id = array(

			  			'obj_id' => $object['obj_id'],
			  			'obj_i' => $i

			  		); ?>
                    <tr class="object_<?= $object['obj_id']; ?>">
                        <td>
                            <?= $i; ?>
                        </td>
                        <td>
                            <?= $object['obj_country_name']; ?>
                        </td>
                        <td>
                            <?= $object['obj_city_name']; ?>
                        </td>
                        <td>
                            <?= $object['obj_inst_name']; ?>
                        </td>
                        <td>
                            <?= $object['obj_title']; ?>
                        </td>
                        <td>
                            <?= $object['obj_short_describtion']; ?>
                        </td>
                        <td>
                            <?= $object['obj_discount']; ?>%</td>
                        <td>
                            <?= $object['image_number']; ?>
                        </td>
                        <td>
                            <!-- Delete -->
                            <button style="border: none; background:none;cursor: pointer;color:red;" value="<?php echo $object['obj_id']; ?>" class="delete_button">
                                <i class="fas fa-times fa-lg "></i>
                            </button>
                            <!-- Preview -->
                            <a class="preview_button px-2" href="/objects/view/<?= $object['obj_id']; ?>" style="cursor: pointer; color: blue;">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i ++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>