
    <!-- Home Banner Start -->
    <section id="home" class="home-banner" style="background-image: url('<?= base_url(); ?>assets/img/banner-1.jpg'); height: 200vh;">
      <div class="container p-t-100px">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-7">
            <div class="section-title text-center">
              <h2>Создайте Компанию</h2>
              <p>Создайте компанию выбрав Страну, Город, Предприятие ... </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-lg-9">
            <div class="white-bg m-b-50px" id="valid_errors">
              <?php echo validation_errors(); ?>
            </div>
            
          </div>
          <div class="col-12 col-lg-9">
            <div class="contact-form white-bg m-b-30px-md">
              <?= form_open('objects/create_object'); ?>
              <div class="row">
                <?php if (!$has_data) { ?>
                  <div class="col-sm-5">
                    <h3 class="font-alt">Выберите Страну </h3>
                    <p>Выберите одну из предоставленных стран в списке.</p> 
                  </div>
                    <div class="col-sm-7">
                      <div class="select-area mb-3" id="country_select">
                        <select class="form-control" name="country_id">
                          <option value="none">Страна</option>
                          <option value="1">Турция</option>
                          <option value="2">Украина</option>
                          <option value="3">Франция</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-5" id="city_div">
                      <h3 class="font-alt">Выберите Город </h3>
                       <p>Выберите один из предоставленных городов в списке.</p> 
                    </div>
                    <div class="col-sm-7">
                      <div class="select-area mt-3" id="city_select">
                        
                      </div>  
                    </div>
                    <div class="col-sm-5" id="inst_div">
                      <h3 class="font-alt">Выберите Организацию </h3>
                    <p>Выберите одну из предоставленных организаций в списке.</p>
                    </div>
                    <div class="col-sm-7">
                     <div class="select-area mt-3" id="inst_select">

                     </div> 
                    </div>
                <?php } else { ?>
                      <input type="hidden" name="country_id" value="<?php echo $country_id; ?>">
                      <input type="hidden" name="city_id" value="<?php echo $city_id; ?>">
                      <input type="hidden" name="inst_id" value="<?php echo $inst_id; ?>">
                <?php } ?>
              	
                <div class="col-12">
                  <div class="row" id="additional_inputs">
                    <div class="col-sm-6">
                        <h3 class="font-alt">Назовите свое Заведение/Компанию</h3>
                      <p>Введите назание своей Организации/Ресторана...</p>
                      </div>
                      <div class="col-sm-6">
                          <div class="select-area mt-3" id="name">
                            <input type="text" class="form-control" placeholder="Название" name="name" value="<?= $name; ?>">
                          </div> 
                     </div> 
                       <div class="col-sm-6">
                          <h3 class="font-alt">Укажите свою Скидку</h3>
                          <p>Введите скидку для своей Организации/Ресторана...</p>
                      </div>
                      <div class="col-sm-6">
                          <input placeholder="Скидка" class="form-control" type="number" name="discount" value="<?= $discount; ?>">
                     </div>

                     <div class="col-sm-6">
                          <h3 class="font-alt">Ссылка на ваш сайт</h3>
                          <p>Введите адрес вашего веб-сайта..</p>
                      </div>
                      <div class="col-sm-6">
                          <input placeholder="example.com" class="form-control" type="text" name="website" value="<?= $website; ?>">
                     </div>
                      
                      <div class="col-sm-6">
                          <h3 class="font-alt">Ваше Имя</h3>
                          <p>Имя которое вы предпочитаете чтоб к вам обращались в случае звонка.</p>
                      </div>
                      <div class="col-sm-6">
                          <input  class="form-control" type="text" placeholder="Имя" name="owner_name" value="<?= $owner_name; ?>">
                     </div>

                     <div class="col-sm-6">
                          <h3 class="font-alt">Ваш email</h3>
                          <p>Ваш email нужен для того чтобы вам приходили письма о тех поситителях которые взяли вашу скидку.</p>
                      </div>
                      <div class="col-sm-6">
                          <input  class="form-control" type="text" placeholder="email (будет использоваться как ваш Логин)" name="owner_email" value="<?= $owner_email; ?>">
                     </div>

                      <div class="col-sm-6">
                          <h3 class="font-alt">Ваш пароль</h3>
                          <p>Ваш пароль нужен для того чтобы войти в ваш личный кабинет.</p>
                      </div>
                      <div class="col-sm-6">
                          <input  class="form-control" type="text" placeholder="Ваш пароль (будет использоваться как ваш Логин)" name="owner_password" value="<?= $owner_password; ?>">
                     </div>


                      <div class="col-sm-6">
                          <h3 class="font-alt">Номер</h3>
                          <p>Введите свой рабочий номер.</p>
                      </div>
                      <div class="col-sm-6">
                          <input  class="form-control" type="text" placeholder="+38(067)-51-90-938" name="phone_number" value="<?= $phone_number; ?>">
                     </div>

                     <div class="col-sm-6">
                          <h3 class="font-alt">Адрес</h3>
                          <p>Введите адрес своего предприятия.</p>
                      </div>
                      <div class="col-sm-6">
                          <input  class="form-control" type="text" placeholder="Адрес" name="adress" value="<?= $adress; ?>">
                     </div>

                     <div class="col-sm-6">
                        <h3 class="font-alt">Краткое описание вашего бизнеса </h3>
                        <p>Краткое описание вашего бизнеса(2 - 3 строки)</p>
                     </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <textarea placeholder="Описание" rows="3" class="form-control" name="short_describtion"><?= $short_describtion; ?></textarea>
                        </div>
                      </div>
                     <div class="col-12">
                        <h3 class="font-alt" style="margin: 0;">Детальное описание вашего бизнеса </h3>
                        <p>Опишите здесь свои преимущества и то чем вы занимаетесь</p>
                     </div>
                      <div class="col-12">
                        <div class="form-group">
                          <textarea name="full_describtion" placeholder="Описание" rows="3" class="form-control"><?= $full_describtion; ?></textarea>
                        </div>
                      </div>
                     

                      
                  </div>
                </div>
                <div class="col-12 text-center mt-5">
                    <button type="submit" class="btn btn-success" id="create_button">Создать</button>
                </div>
              </div>
              </form>
            </div>
          </div> 
        </div>
      </div>
    </section>

    <!-- / -->


