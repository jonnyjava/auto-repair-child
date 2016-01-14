function activate_vin_number_char_counter(){
  $('#vin_number').keyup(function(){
    $('#vin_number_filled_chars').text($(this).val().length);
    $('#vin_number_tooltip').hide();
  });
}

function activate_vin_number_search(){
  $('.js_vin_numer_search_fallback').bind("click", search_by_vin_number);
  $('#vin_number_searcher').click(function(){
    search_by_vin_number();
  });
}

function search_by_vin_number(){
  var vin_field = $('#vin_number');
  var vin_value = vin_field.val();
  var vin_is_valid = perform_dedicate_validation(vin_field, vin_value);
  if(vin_is_valid){
    get_car_details($(this));
  }
}

function get_car_details(clicked_button){
  var vin_number = $('#vin_number').val().toUpperCase();
  var serialized_datas = 'vin_number='+vin_number;
  var my_destination = $('#onboarding_form').attr('action')+"/controllers/vin_controller.php";
  $.ajax({type: 'POST', data: serialized_datas, url: my_destination, async: true}).success(function(response){
    var parsed_response = jQuery.parseJSON(response);
    if(parsed_response.status == 400){
      vin_not_found();
    }
    else{
      vin_found(parsed_response);
    }
  }).error(function(){
    vin_not_found();
  });
}

function vin_found(parsed_response){
  var parsed_car_details = jQuery.parseJSON(parsed_response.car_details);
  if (parsed_car_details.length != 0){
    autofill_car_details_dropdowns(parsed_car_details);
    var animation_time = 300;
    animate_details('car_found', animation_time);
    activate_reset_car_details_by_user();
    deactivate_dropdown_toggle();
  }
  else{
    vin_not_found();
  }
}

function vin_not_found(){
  animate_details('car_not_found', 300);
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
  toggle_caret();
}

function reset_car_detail_fields(){
  $('#car_brand').html('<i class="hint">Tu marca:</i>');
  $('#car_brand_disabled_hint').show();
  $('#car_brand_dropdown').hide();
  $('#car_engine_letters_dropdown').val('');

  disable_field('model');
  disable_field('year');
  disable_field('engine');
  disable_field('engine_letters');
  toggle_caret();
}

function activate_reset_car_details_by_user(){
  $('.js_car_detail_wrong').show();
  $('.js_car_detail_wrong').click(function(){
    hide_message_line(300);
    reset_car_detail_fields();
    activate_dropdown_toggle();
  });
}

function disable_vin_validation(){
  $('.js_vin_numer_search_fallback').unbind("click", search_by_vin_number);
  $('#vin_number').data('validation-type', '');
}

function toggle_caret(){
  $('.js_toggle_caret').each(function(){
    $(this).toggle();
    $(this).parent().toggleClass('disabled-field');
  })
}
