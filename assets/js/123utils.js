function count_chars(filled_field){
  var field_id = filled_field.attr('id');
  $('#'+field_id+'_filled_chars').text(filled_field.val().length);
  deemphatize_error(field_id);
}

function toggle_caret(){
  $('.js_toggle_caret').each(function(){
    $(this).toggle();
    $(this).parent().toggleClass('disabled-field');
  });
}

function emphatize_error(field_id){
  var tooltip = $('#'+field_id+'_tooltip');
  if(tooltip.length){
    var container_id = tooltip.closest('fieldset').attr('id');
    tooltip.show();
    build_error_message(tooltip);
    show_error_panel(container_id);
  }
  $('#'+field_id).addClass('error_emphasis');
}

function deemphatize_error(field_id){
  var tooltip = $('#'+field_id+'_tooltip');
  if (tooltip.length){
    var container_id = tooltip.closest('fieldset').attr('id');
    tooltip.hide();
    $('.js_error_'+field_id+'_tooltip').remove();
    $('#'+field_id).removeClass('error_emphasis');
    hide_error_panel_if_empty(container_id);
  }
}

function build_error_message(tooltip){
  var error_name = 'js_error_'+tooltip.attr('id');
  if(!$('.'+error_name).length){
    var error_message = '<div class="col-lg-4 col-xs-12 '+error_name+' error_explained">'+ tooltip.text() + '</div>';
    $('.js_form_error_list').append(error_message);
  }
}

function send_to_api(submitted_datas, destination_url, method, ok_callback, ko_callback){
  $.ajax({
    type: method,
    data: submitted_datas,
    headers: {
      Authorization: 'Token token='+api_auth_token
    },
    url: api_url+destination_url,
    async: true
  }).done(function(response){
    if(ok_callback){ok_callback(response);}
  }).error(function(){
    if(ko_callback){ko_callback();}
  }).always(function(){
    hide_preloader();
  });
}
