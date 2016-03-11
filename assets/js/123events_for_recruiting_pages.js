function activate_button_bar(){
  $('.js_button_bar').click(function(){
    toggle_button_in_bar($(this));
  });
}

function activate_address_autocomplete(){
  $('.js_autocompletable_address').geocomplete({ componentRestrictions: {country: 'es'} });
}

function activate_recruiting_bouncer(){
  $('.js_recruiting_bouncer').click(function(){
    show_bouncing_feedback_form();
    update_recruitable_status('dismissed');
  });
}

function activate_feedback_submit(){
  $('.js_submit_feedback').click(function(){
    submit_feedback_form();
  });
}

function activate_feedback_form(){
  activate_dropdown_toggle();
  $('.js_dropdown_menu > li').bind('click', fill_dropdown_with_selected_option);
  activate_dropdown_autoclose();
  activate_char_counter();
  activate_feedback_submit();
}
