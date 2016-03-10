function submit_onboarding_form(){
  var my_destination = global_server_url + '/controllers/demand_controller.php';
  var submitted_datas = $('#onboarding_form').serialize();
  $.ajax({type: 'POST', data: submitted_datas, url: my_destination, async: true}).done(function(response){
    var parsed_response = jQuery.parseJSON(response);
    if(parsed_response.status === 400){
      load_review_page(parsed_response);
    }
    else{
      load_confirmation_page(parsed_response);
    }
  }).error(function(){
    load_error_page();
  }).always(function(){
    hide_preloader();
  });
  return false;
}

function load_review_page(data){
  $('#submit_result').html(load_partial('review_wrong_info.html'));
  $('#wrong_fields_container').html(build_review_row(data.errors));

  activate_city_autocomplete();
  activate_form_submit();
  show_result();
  activate_review_fields_and_original_binding(data.errors);
}

function load_confirmation_page(data){
  var there_is_no_car = false;
  var there_is_no_engine = false;
  $('#submit_result').html(load_partial('confirmation_page.html'));
  $.each(data.demand, function(key, value){
    if(key === 'brand' && value === ''){
      there_is_no_car = true;
    }
    if(key === 'engine' && value === ''){
      there_is_no_engine = true;
    }
    $('#confirmation_'+key).html(value);
  });
  parse_demand_details(data);
  if(there_is_no_car){
    var content = "<li class='list-group-item'><span class='horizontal_list_header'>No necesitamos conocerlo</span></li>";
    $('#confirmation_car_details').html(content);
  }
  if(there_is_no_engine){
    $('#confirmation_engine_section').empty();
  }
  show_result();
}

function parse_demand_details(data){
  var details = jQuery.parseJSON(data.demand.demand_details);
  var demand_details = '';
  $.each(details, function(key, value){
    if(key.indexOf('_option') == -1){
      if(key.indexOf('car_') != -1){
        $('#confirmation_'+key).html(value);
      }
      else{
        demand_details += build_confirmation_details_row(key, value);
      }
    }
  });
  $('#confirmation_details').html(demand_details);
}

function build_confirmation_details_row(key, value){
  var content = '';
  content +="<li class='list-group-item'>";
  content +="<span class='horizontal_list_header'>"+translate(key)+"</span>";
  content +="<span class='horizontal_list_content'>"+value+"</span>";
  content +="</li>";
  return content;
}

function translate(value){
  var translations = {};
  translations['budget_id'] = 'Rango de precios';
  translations['tyre_budget_id'] = 'Rango de precios';
  translations['rim_type_id'] = 'Tipo de llanta';
  translations['tires_size_id'] = 'Medida';
  translations['number_of_tyres_id'] = 'Cantidad';
  translations['revision_by_brand'] = 'Revision por el constructor';
  translations['change_filter'] = 'Sustitución del filtro';
  translations['glass_type_id'] = 'Tipo de luna';
  translations['rearview_type_id'] = 'Tipo de retrovisor';
  translations['shock_absorber_type_id'] = 'Parachoques';
  translations['color'] = 'Color';
  translations['brakes_id'] = 'Pastillas';
  translations['brakes_disks_id'] = 'Discos';
  translations['electric_glass_close_id'] = 'Elevalunas';
  translations['lamp_type_id'] = 'Faro';
  translations['light_type_id'] = 'Lampara';
  translations['light_quantity_id'] = 'Cantidad';
  translations['injector_service_category_id'] = 'Intervención';
  translations['injector_quantity_id'] = 'Cantidad';
  translations['gas_tube_id'] = 'Tipo de escape';
  translations['wheel_shock_absorber_type_id'] = 'Amortiguador';
  translations['keencap_type_id'] = 'Rotula';
  translations['cup_type_id'] = 'Copela';
  translations['bearing_type_id'] = 'Rodamiento';
  translations['air_conditioned_id'] = 'Pack de servicios';
  return translations[value] || value;
}

function build_review_row(fields){
  var content = '';
  for(var i = 0; i <fields.length; i++){
    $.each(fields[i], function(key, value){
      content += "<div class='row car-details-row'>"+load_partial(key+'.html')+"</div>";
    });
  }
  return content;
}

function bind_review_field_with_original(fields, clicked_button){
  for(var i = 0; i <fields.length; i++){
    $.each(fields[i], function(key, value){
      var doubled_field = $("[name='"+key+"'']");
      if(doubled_field.length > 1){
        doubled_field[0].value = doubled_field[1].value;
      }
    });
  }
}
