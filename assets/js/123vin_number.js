function activate_vin_number_search(){
  $('#vin_number_searcher').click(function(){
    var my_destination = $('#onboarding_form').attr('action');
    var vin_number = $('#vin_number').val().toUpperCase();
    var serialized_datas = 'vin_number='+vin_number;
    $.ajax({type: 'POST', data: serialized_datas, url: my_destination, async: true}).success(function(response){
      var parsed_response = jQuery.parseJSON(response);
      if(parsed_response.status == 400){
        console.log("algo ha ido mal con el parsing");
      }
      else{
        autofill_car_details_dropdowns(parsed_response.car_details);
      }
    }).error(function(parsed_response){
      console.log('kaboom');
    });
    $('.js_detail_toggler').click();
    show_message();
  });
}

function show_message(){
  //console.log('ya me lo pienso');
}

function autofill_car_details_dropdowns(car_details){
  var details = jQuery.parseJSON(car_details);
  $.each(details, function(key, value){
    var choosen_option = value;
    var parentId = $('#car_'+key+'_dropdown').data('parent-id');
    if(key != 'brand'){
      enable_field(key, '');
    }
    $('#'+parentId).text(choosen_option);
    $('#'+parentId+'_id').val(choosen_option);
    $('#'+parentId+'_tooltip').hide();
  });
  enable_field('engine_letters');
}