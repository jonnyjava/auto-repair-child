function set_global_server_url(){
  global_server_url = $('#onboarding_form').attr('action');
}

function disable_google_autofill(){
  $('div').removeAttr('tabindex');
  $('input').attr('autocomplete', 'false');
  $('input').attr('autofill', 'false');
}

function disable_enter_key(event){
  if (event.which === '13') {
    event.preventDefault();
  }
}

function enable_esc_key_as_dropdown_closer(event){
  if (event.which === '0') {
    $('.js_dropdown_menu').hide();
  }
}

function append_examples(){
  var url = $('#js_onboarding_container').data('partial-url');
  $('#vin_number_help').appendTo('body');
  $('#engine_letters_help').appendTo('body');
  $('#vin_img').css('background', "url("+url+"/assets/img/ficha_coche.jpg"+")");
  $('#engine_letters_img').css('background', "url("+url+"/assets/img/ficha_coche.jpg"+")");
}

function remove_element(array, element){
  var element_index = array.indexOf(element);
  if (element_index > -1) {
    array.splice(element_index, 1);
  }
  return array;
}
