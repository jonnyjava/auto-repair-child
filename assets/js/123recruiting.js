$(document).ready(function(){
  setup_globals();
  setup_form();
  run_activations();
  prefill_form();
  animate_container_height($('#step_1'));
});

function setup_form(){
  set_global_server_url('join');
  prevent_events_defaults();
}

function run_activations(){
  activate_join_form_submit();
  activate_hide_tooltip();
  activate_password_strength_checker();
  activate_phone_autoformatter();
  activate_address_autocomplete();
  activate_recruiting_bouncer();
}
