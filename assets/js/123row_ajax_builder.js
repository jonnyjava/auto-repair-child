function build_row(fields, row_class){
  var content = "";
  for(var i = 0; i <fields.length; i++){
    if (fields[i] != ""){
      content += load_partial(fields[i]+".html");
    }
  }
  content = "<div class='"+row_class+"'>"+content+"</div>";
  return content;
}

function load_partial(page){
  var partial_folder_url = global_server_url + "/partials/_"+page;
  var loaded_page = '';
  $.ajax({type: 'GET', url: partial_folder_url, async: false}).done(
    function(data){
      loaded_page = data;
    });
  return loaded_page;
}


function build_first_step(){
  var container = $('#js_dynamic_form_first_step');
  var content = build_row(['user_city', 'service_category'], 'row');
  container.html(content);
  animate_first_step(container);
}

function build_third_step(){
  var content = build_row(['name_and_surnames'], 'row car-details-row');
  content += build_row(['phone', 'email'], 'row car-details-row');
  $('#js_dynamic_form_third_step').html(content);
}

function get_form_content(){
  $('.js_servicename').click(function(event){
    event.preventDefault();
    var has_details = $(this).data('car-details-fields');
    var fields = $(this).data('car-fields').split(',');
    var content = "";
    var js_toggling_class = "";
    $('#service_id').val($(this).html());

    if (has_details){
      js_toggling_class = "js_toggle_details"
      content += build_row(['vin_number'], 'row bottom-gutter js_vin_search_toggler');
      content += build_row(['car_details_message'], 'row car-details-row bottom-gutter js_car_details_message_box');
    }

    if (fields.length > 1){
      content += build_row(fields, 'row car-details-row '+js_toggling_class);
    }

    if (has_details){
      content += build_row(['engine','engine_letters'], 'row car-details-row bottom-gutter '+js_toggling_class);
    }

    fields = $(this).data('service-fields').split(',');
    if (fields[0].length > 0){
      content += build_row(fields, 'row car-details-row');
    }
    $('#js_dynamic_form').html(content);
    $(".js_dropdown_menu > li").bind("click", fill_dropdown_with_selected_option);
    $(".js_radiobutton").bind("change", fill_radio_with_selected_option);
    activate_dropdown_toggle();
    car_selector();
    animate_to_next($(this));
    fill_problem_breadcrumb($(this).text());
    if (has_details){
      activate_details_animation();
      activate_vin_number_search();
      activate_vin_number_char_counter();
      activate_undo_car_breadcrumb();
      append_examples();
    }
  });
}

function activate_details_animation(){
  $('.js_detail_toggler').click(function(){
    hide_vin_line();
    $('.js_toggle_details').slideToggle(global_animation_time, function(){
      animate_container_height($('#step_2'));
    });
  });
}
