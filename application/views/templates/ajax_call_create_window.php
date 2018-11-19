<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" id="modal-window">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-alt-custom-section-heading" id="exampleModalLabel">Создание объэкта</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row justify-content-center">
      	<!-- THE CONTAINER FOR INPUTS STARTS HERE!!! -->

       	<div class="col-12">
            <div class="white-bg m-b-50px" id="ajax_response">

            </div>
      	</div>

	   <div id="inputs" class="row px-3">
		
	
      	<div class="col-sm-5">
           <h3 class="font-alt-custom-heading">Выберите Страну </h3>
           <p class="font-alt-custom">Выберите одну из предоставленных стран в списке.</p> 
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
          <h3 class="font-alt-custom-heading">Выберите Город </h3>
           <p class="font-alt-custom">Выберите один из предоставленных городов в списке.</p> 
        </div>
        <div class="col-sm-7">
          <div class="select-area mt-3" id="city_select">
            
          </div>  
        </div>
        <div class="col-sm-5" id="inst_div">
          <h3 class="font-alt-custom-heading">Выберите Организацию </h3>
       		<p>Выберите одну из предоставленных организаций в списке.</p>
        </div>
        <div class="col-sm-7">
         <div class="select-area mt-3" id="inst_select">

         </div> 
        </div>

			
		 <div class="col-12">
                  <div class="row" id="additional_inputs">
                    <div class="col-sm-6">
                        <h3 class="font-alt-custom-heading">Назовите свое Заведение/Компанию</h3>
                      	<p class="font-alt-custom" >Введите назание своей Организации/Ресторана...</p>
                      </div>
	                  <div class="col-sm-6">
		                  <div class="select-area mt-3" id="name">
		                    <input type="text" class="form-control" id="input_name" placeholder="Название" name="name" id="input_name" value="">
		                  </div> 
	         		  </div> 
                       <div class="col-sm-6">
                          <h3 class="font-alt-custom-heading">Укажите свою Скидку</h3>
                          <p class="font-alt-custom">Введите скидку для своей Организации/Ресторана...</p>
                      </div>
                      <div class="col-sm-6">
                          <input placeholder="Скидка" class="form-control" id="input_discount" type="number" name="discount" value="">
                     </div>

                     <div class="col-sm-6">
                          <h3 class="font-alt-custom-heading">Ссылка на ваш сайт</h3>
                          <p class="font-alt-custom">Введите адрес вашего веб-сайта..</p>
                      </div>
                      <div class="col-sm-6">
                          <input placeholder="example.com" class="form-control" id="input_website" type="text" name="website" value="">
                     </div>
                      
                      <div class="col-sm-6">
                          <h3 class="font-alt-custom-heading">Ваше Имя</h3>
                          <p class="font-alt-custom">Имя которое вы предпочитаете чтоб к вам обращались в случае звонка.</p>
                      </div>
                      <div class="col-sm-6">
                          <input  class="form-control" id="input_owner_name" type="text" placeholder="Имя" name="owner_name" value="">
                     </div>

                      <div class="col-sm-6">
                          <h3 class="font-alt-custom-heading">Номер</h3>
                          <p class="font-alt-custom">Введите свой рабочий номер.</p>
                      </div>
                      <div class="col-sm-6">
                          <input  class="form-control" id="input_phone_number" type="text" placeholder="+38(067)-51-90-938" name="phone_number" value="">
                     </div>

                     <div class="col-sm-6">
                          <h3 class="font-alt-custom-heading">Адрес</h3>
                          <p class="font-alt-custom">Введите адрес своего предприятия.</p>
                      </div>
                      <div class="col-sm-6">
                          <input  class="form-control" id="input_adress" type="text" placeholder="Адрес" name="adress" value="">
                     </div>

                     <div class="col-sm-6">
                        <h3 class="font-alt-custom-heading">Краткое описание вашего бизнеса </h3>
                        <p class="font-alt-custom">Краткое описание вашего бизнеса(2 - 3 строки)</p>
                     </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <textarea placeholder="Описание" rows="3" class="form-control" id="input_short_describtion" name="short_describtion"></textarea>
                        </div>
                      </div>
                     <div class="col-12">
                        <h3 class="font-alt-custom-heading" style="margin: 0;">Детальное описание вашего бизнеса </h3>
                        <p class="font-alt-custom">Опишите здесь свои преимущества и то чем вы занимаетесь</p>
                     </div>
                      <div class="col-12">
                        <div class="form-group">
                          <textarea name="full_describtion" placeholder="Описание" rows="3" class="form-control" id="input_full_describtion"></textarea>
                        </div>
                      </div>
                     

                      
                  </div>
         </div>
	</div>
	
      	<!-- ENDS HERE!!!! -->
      </div>
      <div class="modal-footer" style="justify-content: center;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="create_button_ajax_call">Create</button>
      </div>
    </div>

  </div>
</div>