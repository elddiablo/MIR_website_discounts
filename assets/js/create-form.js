$('#create_button').hide();
$('#create_button_ajax_call').hide();
$('#additional_inputs').hide();
$('#inst_div').hide();
$('#city_div').hide();



if ($( "#country_select select" ).length === 0) {
  
  if ($('#valid_errors').html() !== "") {
    $('#valid_errors').toggleClass('contact-form');
  } else {
    $('#valid_errors').toggleClass('contact-form');
  }
  $('#create_button').fadeIn(700);
      showAdditionalInputs(); 
      
} else {
    $( "#country_select select" ).change(function() {

    $('#select_spy').html('Select City');

    if ($( "#inst_select select" ).length > 0) {

      $( "#inst_select select" ).remove();
      $( "#create_button" ).hide();


    }

    $.ajax({
      url: '/search/get_cities',
      type: 'GET',
      data: {country_id: $(this).val()},
    })
    .fail(function() {
      console.log("error");
    })
    .success(function(data){
      $('#city_select').html(data);
      $('#city_div').show();
      citySelect();
    })
    
  });
}





function citySelect(){
  $( "#city_select select" ).change(function() {

    $('#select_spy').html('Select Institution');

    $.ajax({
      url: '/search/get_institutions',
      type: 'GET',
      data: {city_id: $("#city_select select").val()},
    })
    .fail(function() {
      console.log("error");
    })
    .success(function(data){
      $('#inst_select').html(data);
      $('#inst_div').show();
      onInstSelect();
    })
    
  });
}



function onInstSelect () {
  $( "#inst_select select" ).change(function() {
      $('#create_button').fadeIn(700);
      showAdditionalInputs();
  });
}



function showAdditionalInputs(){
  $('#additional_inputs').show();
  $('#create_button').show();
  $('#create_button_ajax_call').show('400', function() {
    $(this).click(function() {
      createObjectCall();
    });
  });
  

}



function createObjectCall() {

  $.ajax({
      url: '/objects/create_object',
      type: 'POST',
      data: {
        country_id: $("#country_select select").val(),
        city_id: $("#city_select select").val(),
        inst_id: $("#inst_select select").val(),
        name: $("#input_name").val(),
        owner_name: $("#input_owner_name").val(),
        discount: $("#input_discount").val(),
        phone_number: $("#input_phone_number").val(),
        adress: $("#input_adress").val(),
        website: $("#input_website").val(),
        short_describtion: $("#input_short_describtion").val(),
        full_describtion: $("#input_full_describtion").val()
    }

    })
    .fail(function() {
      console.log("error");
    })
    .success(function(data){
        
        console.log("success");



        $('#ajax_response').html(data); 

        if (is_ajax_successful) {$('#inputs').html("");

      }
    }); 
  
  
}

function hideAllInputsAfterAjaxCall(){

  $('#inputs').hide();

}




 $('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    responsiveClass:true,
    items:1
});






