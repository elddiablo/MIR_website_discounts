
$('#submit_button').hide();
$('#results').parent().hide();
$('#show_more_results_area').hide();

onCountrySelect();

function onCountrySelect() {

    hideResultsSection();

    $( "#country_select select" ).change(function() {

    $('#hide_on_search').hide(1000);
    $('#services').css('padding-bottom', '165px');


    $('#select_spy').html('Select city');

    if ($( "#inst_select select" ).length > 0) {

      $( "#inst_select select" ).remove();
      $( "#submit_button" ).hide();
      $('#results').hide();

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
      citySelect();
    })
    
  });

}



function citySelect(){

  hideResultsSection();

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
      onInstSelect();
    })
    
  });
}

function onInstSelect () {

  $( "#inst_select select" ).change(function() {
      hideResultsSection();
      $('#select_spy').html('Push the search button');
      $('#submit_button').fadeIn(700);
      executeSearch();
  });
}

function executeSearch () {
  
  $('#submit_button').on('click', function() {

    loadingScreen();
    
    $.when(showResultsSection()).then(

      $.ajax({
        url: '/search/do_search',
        type: 'GET',
        data: {
          inst_id: $("#inst_select select").val(),
          city_id: $("#city_select select").val()
        },
      })
      .fail(function() {
        console.log("error");
      })
      .success(function(data){
        $('#search_results').html(data);

        showMoreResultsButton();

      })

    );

    
    


    

  });
}

function showResultsSection() {
  $('#results').parent().show();
}

function hideResultsSection() {

  $('#results').parent().hide();
 
 }



function showMoreResultsButton() {

      $('#show_more_results_area').show();

      var city_val = $('#city_select_input').val();
      console.log(city_val);
      $('#city_select_more_field').val(city_val);

      var inst_val = $('#inst_select_input').val();
      console.log(inst_val);
      $('#inst_select_more_field').val(inst_val);

}



function navigateToResults() {

  $('#submit_button').on('click', function (e) {
  e.preventDefault();

  setTimeout(function() {

    $('html, body').animate({
    scrollTop: $($('#results').parent()).offset().top
  }, 500, 'linear');

  }, 100);
    
  });

}





