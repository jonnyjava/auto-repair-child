garage_id = null;

function submit_join_form(){
  var submitted_datas = $('#join_form').serialize();
  tokenized_submit(submitted_datas, '/garage_registrations', 'POST', show_errors_or_continue);}

function submit_update_garage_info_form(){
  var submitted_datas = get_selected_services();
  var api_destination = '/garage_registrations/'+garage_id;
  tokenized_submit(submitted_datas, api_destination, 'PATCH', load_last_step_recruiting);
}

function get_selected_services(){
  var garage_services = $('.js_selectable_service:checked').map(function() {
    return(this.value);
  }).get();

  var garage_service_json = { "id": garage_id, "service_ids": garage_services };
  return garage_service_json;
}

function tokenized_submit(submitted_datas, api_destination, method, callback){
  $.get( global_server_url + '/controllers/ewok_connection_controller.php', function(response){
    var parsed_response = jQuery.parseJSON(response);
    var submit_url = parsed_response.url+api_destination;
    send_to_api(submitted_datas, parsed_response.token, submit_url, method, callback);
  });
}

function send_to_api(submitted_datas, token, submit_url, method, function_to_execute){
  $.ajax({
    type: method,
    data: submitted_datas,
    headers: {
      Authorization: 'Token token='+token
    },
    url: submit_url,
    async: true
  }).done(function(response){
    function_to_execute(response);
  }).error(function(){
    load_error_page();
  }).always(function(){
    hide_preloader();
  });
}

function show_errors_or_continue(response){
  var errors = response.errors;
  if(errors === undefined){
    load_second_step_recruiting(response);
  }
  else{
    show_errors_tooltips(errors);
  }
}

function load_second_step_recruiting(response){
  load_recruiting_confirmation_page(response);
  activate_button_bar();
  activate_update_garage_info_form_submit();
}

function load_last_step_recruiting(){
  $('#submit_result').html(load_partial('recruiting_final_page.html'));
  show_result();
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

function load_recruiting_confirmation_page(response){
  garage_id = response['id'];
  $('#submit_result').html(load_partial('recruiting_confirmation_page.html'));
  show_result();
}
