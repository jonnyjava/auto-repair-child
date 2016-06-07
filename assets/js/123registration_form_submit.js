garage_id = null;

function submit_join_form(){
  var submitted_datas = $('#recruitable_form').serialize().replace(/recruitable_/gi, '');
  var submit_url = '/garage_registrations';
  send_to_api(submitted_datas, submit_url, 'POST', show_errors_or_continue, load_error_page);
  update_recruitable_status('recruited');
}

function update_recruitable_status(status){
  var token = $('#token').val();
  if(token){
    var submitted_datas = 'token='+token+'&status='+status;
    var submit_url = '/garage_recruitables/'+token;
    send_to_api(submitted_datas, submit_url, 'PATCH', null, null);
  }
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

  var garage_service_json = { 'id': garage_id, 'service_ids': garage_services };
  return garage_service_json;
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
  send_to_api('', '/services.json', 'GET', draw_service_multiselects, load_error_page);
}

function show_errors_tooltips(errors){
  for (var error_name in errors) {
    if (errors.hasOwnProperty(error_name)) {
      var tooltip_text = errors[error_name];
      if (!error_name.match(/garage_/)){ error_name = 'recruitable_'+error_name; }
      $('#'+error_name+'_tooltip').text(tooltip_text);
      emphatize_error(error_name);
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


function draw_service_multiselects(data){
  var rows = '';
  var row = '';
  var column = '';

  $.each(data, function(key, value){
    column = '';
    if (key%3==0){
      rows += '<div class="row">'+row+'</div>';
      row = '';
    }
    row += '<div class="col-xs-4 halfgutter">';
    row += build_multiselect_select(value.service_category)
    row += '</div>';
  });
  $('#multiselect_container').html(rows);
  $('.js_multiple_selector').change(function() {
      console.log($(this).val());
  }).multipleSelect({
      width: '100%'
  });
  animate_container_height($('#step_2'));
}

function build_multiselect_select(service_category){
  var icon = 'icon-' + service_category.icon;
  var datalabel = 'data-label=' + service_category.name;
  var options = build_multiselect_options(service_category.services);
  return '<select multiple="multiple" class="multiple-select-dropdown '+icon+' js_multiple_selector" '+datalabel+'>'+options+'</select>';
}

function build_multiselect_options(services){
  var options = ''
  $.each(services, function(key, value){
    options += '<option value="'+value.id+'" class="js_selectable_service">'+value.name+'</option>';
  });
  return options;
}
