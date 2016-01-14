var current_fs, next_fs, previous_fs;
var left, opacity, scale;
var animating;

$(document).ready(function(){
  preload_car_database();
  absolute_url = $('#js_onboarding_container').data('partial-url');
  build_first_step();
  activate_service_dropdown();
  enable_service_buttons();
  build_third_step();
  disable_google_autofill();
  activate_city_autocomplete();
  $('#user_city').bind('keypress', disable_service_dropdown);
  $('#user_city').bind('typeahead:select', enable_service_dropdown);
  enable_form_submit();
  activate_animation_to_next_step();
  activate_animation_to_previous_step();
  hide_tooltip();
  phone_formatter();
  disable_enter_key();
  activate_breadcrumbs();
});

function build_first_step(){
  var content = build_row(['user_city', 'service_category'], 'row');
  $('#js_dynamic_form_first_step').html(content);
}

function disable_google_autofill(){
  $('div').removeAttr("tabindex");
  $('input').attr('autocomplete', 'false');
  $('input').attr('autofill', 'false');
}

function build_third_step(){
  var content = build_row(['name_and_surnames'], 'row car-details-row');
  content += build_row(['phone', 'email'], 'row car-details-row');
  $('#js_dynamic_form_third_step').html(content);
}

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

function disable_enter_key(){
  $(document).keypress(function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
  });
}

function append_examples(){
  var url = $('#js_onboarding_container').data('partial-url');
  $('#vin_number_help').appendTo("body");
  $('#engine_letters_help').appendTo("body");
  $('#vin_img').css('background', 'url('+url+'/assets/img/ficha_coche.jpg'+')');
  $('#engine_letters_img').css('background', 'url('+url+'/assets/img/ficha_coche.jpg'+')');
}
