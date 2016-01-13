function activate_vin_number_search(){
  $('#vin_number_searcher').click(function(){
    reset_car_detail_fields();
    var field = $('#vin_number');
    var value = field.val();
    var vin_is_valid = perform_dedicate_validation(field, value);
    if(vin_is_valid){
      get_car_details($(this));
    }
  });
}

function get_car_details(clicked_button){
  var vin_number = $('#vin_number').val().toUpperCase();
  var serialized_datas = 'vin_number='+vin_number;
  var my_destination = $('#onboarding_form').attr('action')+"/controllers/vin_controller.php";
  $.ajax({type: 'POST', data: serialized_datas, url: my_destination, async: true}).success(function(response){
    var parsed_response = jQuery.parseJSON(response);
    console.log(parsed_response);
    if(parsed_response.status == 400){
      show_message('car_not_found');
      reset_car_detail_fields();
    }
    else{
      var parsed_car_details = jQuery.parseJSON(parsed_response.car_details);
      if (parsed_car_details.length != 0){
        autofill_car_details_dropdowns(parsed_car_details);
        show_message('car_found');
      }
      else{
        show_message('car_not_found');
        reset_car_detail_fields();
      }
    }

  }).error(function(parsed_response){
    show_message('car_not_found');
  });
}

function show_message(message_type){
  $('.js_detail_toggler').click();
  console.log(message_type);
}

function autofill_car_details_dropdowns(car_details){
  $.each(car_details, function(key, value){
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

function reset_car_detail_fields(){
  $('#car_brand').html('<i class="hint">Tu marca:</i>');
  $('#car_brand_disabled_hint').show();
  var dropdown = $('#car_brand_dropdown');
  dropdown.hide();

  disable_field('model');
  disable_field('year');
  disable_field('engine');
  disable_field('engine_letters');
}
