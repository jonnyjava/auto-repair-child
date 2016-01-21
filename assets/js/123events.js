function activate_animation_to_next_step(){
  $('.next').click(function (event) {
    event.preventDefault();
    var clicked_button = $(this);
    if (content_for_step_is_valid(clicked_button)){
      animate_to_next(clicked_button);
    }
  });
}

function activate_animation_to_previous_step(){
  $('.previous').click(function () {
    animate_to_previous($(this));
  });
}

function activate_phone_autoformatter(){
  $('.js_phone_formatter').keyup(function(){
    phone_autoformatter($(this));
  });
}

function activate_breadcrumbs(){
  $('.js_undo_problem_breadcrumb').click(function(){
    undo_problem_breadcrumb();
  });

  $('.js_car_breadcrumb').click(function(){
    fill_car_breadcrumb();
  });
  activate_undo_car_breadcrumb();
}

function activate_undo_car_breadcrumb(){
  $('.js_undo_car_breadcrumb').click(function(){
    undo_car_breadcrumb();
  });
}

function activate_service_dropdown(){
  $(".js_dropdown_menu > li").bind("click", fill_dropdown_with_selected_option);
  $('#service_category_dropdown > li').click(function(){
    animate_service_dropdowns($(this));
  });
}

function activate_dropdown_toggle(){
  deactivate_dropdown_toggle();
  $('.js_dropdown_opener').each(function(){
    $(this).bind('click', { dropdown_id: $(this).data('dropdown-name') }, dropdown_toggler);
  });
  $('.js_dropdown_menu > li').each(function(){
    $(this).bind('click', { dropdown_id: $(this).parent().attr('id') }, dropdown_toggler);
  });
}

function deactivate_dropdown_toggle(){
  $('.js_dropdown_opener').unbind('click', dropdown_toggler);
  $('.js_dropdown_menu > li').unbind('click', dropdown_toggler);
}

function activate_form_submit(){
  $('.js_saver').click(function () {
    if (content_for_step_is_valid($(this))){
      show_preloader();
      submit_form();
    }
  });
}

function activate_vin_number_char_counter(){
  $('#vin_number').on('blur keyup', function(){
    count_vin_number_chars($(this));
  });
}

function activate_vin_number_search(){
  $('.js_vin_numer_search_fallback').bind("click", search_by_vin_number);
  $('#vin_number_searcher').click(function(){
    search_by_vin_number();
  });
}

function activate_reset_car_details_by_user(){
  $('.js_car_detail_wrong').show();
  $('.js_car_detail_wrong').click(function(){
    hide_message_line();
    reset_car_detail_fields();
    activate_dropdown_toggle();
  });
}

function activate_review_fields_and_original_binding(fields){
  $('.js_saver').click(function () {
    bind_review_field_with_original(fields, $(this))
  });
}
