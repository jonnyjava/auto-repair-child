var current_fs, next_fs, previous_fs;
var left, opacity, scale;
var animating;
var global_animation_time = 300;
var global_slinding_time = 650;
var global_server_url = '';

$(document).ready(function(){
  form_setup();
  build_content();
  run_activations();
});

function build_content(){
  build_first_step();
  get_form_content();
  build_third_step();
  hide_tooltip();
}

function form_setup(){
  set_global_server_url();
  preload_car_database();
  disable_enter_key();
  disable_google_autofill();
}

function run_activations(){
  activate_phone_autoformatter();
  activate_city_autocomplete();
  activate_animation_to_next_step();
  activate_animation_to_previous_step();
  activate_service_dropdown();
  activate_breadcrumbs();
  activate_form_submit();
}
