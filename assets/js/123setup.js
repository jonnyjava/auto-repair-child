function set_global_server_url(){
  global_server_url = $('#onboarding_form').attr('action');
}

function disable_google_autofill(){
  $('div').removeAttr('tabindex');
  $('input').attr('autocomplete', 'false');
  $('input').attr('autofill', 'false');
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
  $('#vin_number_help').appendTo('body');
  $('#engine_letters_help').appendTo('body');
  $('#vin_img').css('background', 'url('+url+'/assets/img/ficha_coche.jpg'+')');
  $('#engine_letters_img').css('background', 'url('+url+'/assets/img/ficha_coche.jpg'+')');
}
