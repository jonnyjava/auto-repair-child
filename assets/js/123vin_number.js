function search_by_vin_number(){
  var vin_field = $('#vin_number');
  var vin_value = vin_field.val();
  var vin_is_valid = perform_dedicate_validation(vin_field, vin_value);
  if(vin_is_valid){
    show_preloader();
    get_car_details();
  }
}

function get_car_details(){
  var vin_number = $('#vin_number').val().toUpperCase();
  var serialized_datas = 'vin_number=' + vin_number;
  var my_destination = global_server_url + "/controllers/vin_controller.php";
  $.ajax({type: 'POST', data: serialized_datas, url: my_destination, async: true}).done(function(response){
    var parsed_response = jQuery.parseJSON(response);
    if(parsed_response.status === 400){
      show_vin_number_search_result('car_not_found');
    }
    else{
      vin_found(parsed_response);
    }
  }).error(function(){
    show_vin_number_search_result('car_not_found');
  }).always(function(){
    hide_preloader();
  });
}

function vin_found(parsed_response){
  var parsed_car_details = jQuery.parseJSON(parsed_response.car_details);
  if ((parsed_car_details !== null) && (parsed_car_details.length !== 0)){
    autofill_car_details_dropdowns(parsed_car_details);
    show_vin_number_search_result('car_found');
    activate_reset_car_details_by_user();
    deactivate_dropdown_toggle();
  }
  else{
    show_vin_number_search_result('car_not_found');
  }
}

function autofill_car_details_dropdowns(car_details){
  var unknown_details = ['brand', 'model', 'year', 'engine'];

  $.each(car_details, function(key, value){
    var parent_id = $('#car_'+key+'_dropdown').data('parent-id');

    if(key !== 'brand'){
      enable_field(key, '');
    }

    fill_hidden_fields($(this), value, parent_id);
    deemphatize_error(parent_id);
    unknown_details = remove_element(unknown_details, key);
  });

  autofill_unknown_values(unknown_details);
  enable_field('engine_letters');
  toggle_caret();
}

function autofill_unknown_values(unknown_details){
  for(var i = 0; i< unknown_details.length; i++){
    var option = "<li data-value='0'>cualquiera</li>";
    var detail_field_name = unknown_details[i];
    enable_field(detail_field_name, option);
    autoclick_if_one_option(detail_field_name);
  }
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

function disable_vin_validation(){
  deemphatize_error('vin_number');
  $('.js_vin_numer_search_fallback').unbind("click", search_by_vin_number);
  $('#vin_number').data('validation-type', '');
}
