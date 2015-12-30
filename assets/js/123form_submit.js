function enable_form_submit(){
  $('.js_saver').click(function () {
    if (content_for_step_is_valid($(this))){
      submit_form($(this));
    }
  });
}

function submit_form(clickedButton){
  clickedButton = $('.js_saver');
  var submittedForm = clickedButton.closest("form")
  var myDestination = submittedForm.attr("action");
  var submittedDatas = submittedForm.serialize();
  $.ajax({type: "POST", data: submittedDatas, url: myDestination, async: true}).success(function(response){
    var parsedResponse = jQuery.parseJSON(response);
    if(parsedResponse.status == 400){
      load_review_page(parsedResponse);
    }
    else{
      load_confirmation_page(parsedResponse);
    }
  }).error(function(parsedResponse){
    load_error_page();
  });
  return false;
}

function load_review_page(data){
  $('#submit_result').html(load_partial('review_wrong_info.php'));
  $('#wrong_fields_container').html( build_review_row(data.errors));

  activate_city_autocomplete();
  enable_form_submit();
  animate_result($(this));
  double_binding(data.errors);
}

function load_confirmation_page(data){
  $('#submit_result').html(load_partial('confirmation_page.php'));
  $.each(data.demand, function(key, value){
    $('#confirmation_'+key).html(value);
  });

  var details = jQuery.parseJSON(data.demand.demand_details);
  var detailContents = "";
  $.each(details, function(key, value){
    if(key.indexOf("_option") == -1){
      if(key.indexOf("car_") != -1){
        $('#confirmation_'+key).html(value);
      }
      else{
        detailContents += build_confirmation_details_row(key, value);
      }
    }
  });
  $('#confirmation_details').html(detailContents);
  animate_result($(this));
}

function build_confirmation_details_row(key, value){
  var content = "";
  content +="<li class='list-group-item'>";
  content +="<span class='horizontal_list_header'>"+translate(key)+"</span>";
  content +="<span class='horizontal_list_content'>"+value+"</span>";
  content +="</li>";
  return content;
}

function translate(value){
  var translations = {};
  translations['budget_optionid'] = "Rango de precios"
  translations['tyre_budget_id'] = "Rango de precios"
  translations['rim_type_id'] = "Tipo de llanta"
  translations['tires_size_id'] = "Medida";
  translations['number_of_tyres_id'] = "Cantidad";
  translations['revision_by_brand'] = "Revision por el constructor";
  translations['change_filter'] = "Sustitución del filtro";
  translations['glass_type_id'] = "Tipo de luna";
  translations['rearview_type_id'] = "Tipo de retrovisor";
  translations['shock_absorber_type_id'] = "Parachoques";
  translations['color'] = "Color";
  translations['brakes_id'] = "Pastillas";
  translations['brakes_disks_id'] = "Discos";
  translations['electric_glass_close_id'] = "Elevalunas";
  translations['lamp_type_id'] = "Faro";
  translations['light_type_id'] = "Lampara";
  translations['light_quantity_id'] = "Cantidad";
  translations['injector_service_category_id'] = "Intervención";
  translations['injector_quantity_id'] = "Cantidad";
  translations['gas_tube_id'] = "Tipo de escape";
  translations['wheel_shock_absorber_type_id'] = "Amortiguador";
  translations['keencap_type_id'] = "Rotula";
  translations['cup_type_id'] = "Copela";
  translations['bearing_type_id'] = "Rodamiento";
  translations['air_conditioned_id'] = "Pack de servicios";
  return translations[value] || value;
}

function load_error_page(){
  $('#submit_result').html(load_partial('error_page.html'));
  animate_result($(this));
}

function animate_result(clickedButton){
  animate_to_next(clickedButton);
  $('#progressbar').fadeOut(300, function(){
    animate_container_height($('#step_4'), 400);
  });
}

function build_review_row(fields){
  var content = "";
  for(var i = 0; i <fields.length; i++){
    $.each(fields[i], function(key, value){
      content += "<div class='row car-details-row'>"+load_partial(key+'.html')+"</div>";
    });
  }
  return content;
}

function double_binding(fields){
  $('.js_saver').click(function () {
    for(var i = 0; i <fields.length; i++){
      $.each(fields[i], function(key, value){
        var doubled_field = $('[name="'+key+'"]');
        if(doubled_field.length > 1){
          doubled_field[0].value = doubled_field[1].value;
        }
      });
    }
  });
}

function load_partial(page){
  var url = absolute_url+"/partials/_"+page;
  var loadedPage = $.ajax({type: "GET", url: url, async: false}).responseText;
  return loadedPage;
}
