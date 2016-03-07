garage_id = null;

function submit_join_form(){
  var submitted_datas = $('#join_form').serialize();
  var submit_url = '/garage_registrations';
  send_to_api(submitted_datas, submit_url, 'POST', show_errors_or_continue, load_error_page);
  update_recruitable_status('recruited');
}

function update_recruitable_status(status){
  var token = $('#token').val();
  var submitted_datas = "token="+token+"&status="+status;
  var submit_url = '/garage_recruitables/'+token;
  send_to_api(submitted_datas, submit_url, 'PATCH', null, null);
}

function submit_update_garage_info_form(){
  var submitted_datas = get_selected_services();
  var submit_url = '/garage_registrations/'+garage_id;
  send_to_api(submitted_datas, submit_url, 'PATCH', load_last_step_recruiting, load_error_page);
}

function get_selected_services(){
  var garage_services = $('.js_selectable_service:checked').map(function() {
    return(this.value);
  }).get();

  var garage_service_json = { "id": garage_id, "service_ids": garage_services };
  return garage_service_json;
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

function show_errors_or_continue(response){
  var errors = response.errors;
  if(errors === undefined){
    load_second_step_recruiting(response);
    $('#submit_step_1').removeClass('js_saver');
  }
  else{
    show_errors_tooltips(errors);
  }
}

function load_second_step_recruiting(response){
  $('#step_2_result_container').removeClass('js_submit_result_container');
  garage_id = response.id;
  show_next_recruiting_step('step_1', 'step_2');
  activate_button_bar();
  activate_update_garage_info_form_submit();
}

function show_errors_tooltips(errors){
  for (var name in errors) {
    if (errors.hasOwnProperty(name)) {
      var tooltip_id = name+'_tooltip';
      var tooltip_text = errors[name];
      $('#'+tooltip_id).text(tooltip_text);
      $('#'+tooltip_id).show();
    }
  }
}

function load_last_step_recruiting(){
  show_next_recruiting_step('step_2', 'step_3');
}

function show_next_recruiting_step(actual_step_id, next_step_id){
  $('#'+next_step_id+'_submit_result').html(load_partial('recruiting_'+next_step_id+'.html'));
  animate_to_next($('#submit_'+actual_step_id));
  show_custom_content(next_step_id);
  animate_container_height($('#'+next_step_id));
}

function show_custom_content(step){
  $('#'+step+'_above_container').html($('#'+step+'_above').html());
  $('#'+step+'_below_container').html($('#'+step+'_below').html());
}
