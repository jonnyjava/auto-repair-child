$(document).ready(function(){
  setup_globals();
  setup_form();
  build_content();
  run_activations();
});

function setup_form(){
  set_global_server_url('onboarding');
  preload_car_database();
  prevent_events_defaults();
  disable_google_autofill();
}

function build_content(){
  build_first_step();
  build_third_step();
}

function run_activations(){
  activate_keyboard_events();
  activate_hide_tooltip();
  activate_phone_autoformatter();
  activate_city_autocomplete();
  activate_animation_to_next_step();
  activate_animation_to_previous_step();
  activate_service_button_as_next_button();
  activate_service_dropdown();
  activate_breadcrumbs();
  activate_form_submit();
  activate_dropdown_autoclose();
}
