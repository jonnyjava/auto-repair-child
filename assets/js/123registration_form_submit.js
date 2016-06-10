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
  recruited_garage_services = $('#recruitable_service_list').val().split(' - ');
  build_multiselect_rows(data);
  create_multiselect();
  activate_counter_for_multiselect();
  count_preselected();
  animate_container_height($('#step_2'));
}

function build_multiselect_rows(data){
  var rows = '';
  var row = '';

  $.each(data, function(key, value){
  if (key % 3 === 0){
      rows += '<div class="row">'+row+'</div>';
      row = '';
    }
    row += build_multiselect_cell(value);
  });
  $('#multiselect_container').html(rows);
}

function build_multiselect_cell(value){
  var cell = '';
  cell += '<div class="col-xs-4 halfgutter">';
  cell += build_multiselect_select(value.service_category);
  cell += '</div>';
  return cell;
}

function build_multiselect_select(service_category){
  var icon = 'icon-' + service_category.icon;
  var datalabel = 'data-label="' + service_category.name +'"';
  var options = build_multiselect_options(service_category.services, recruited_garage_services);
  var select = '<select id="'+service_category.id+'" multiple="multiple" class="multiple-select-dropdown '+icon+' js_multiple_selector" '+datalabel+'>'+options+'</select>';
  var counter = '<span class="service_counter"><span id="counter_for_'+service_category.id+'">0</span> / '+service_category.services.length+'</span>';
  return select + counter;
}

function build_multiselect_options(services, recruited_garage_services){
  var options = ''
  $.each(services, function(key, value){
    var is_selected = '';
    var definitions = value.service_definitions;
    is_selected = preselect_definitions_when_joining(definitions, recruited_garage_services);
    options += '<option '+is_selected+' id="service_'+value.id+'" value="'+value.id+'" class="js_selectable_service" data-definitions="'+definitions+'">'+value.name+'</option>';
  });
  return options;
}

function create_multiselect(){
  $('.js_multiple_selector').multipleSelect({
    width: '100%'
  });
}

function activate_counter_for_multiselect(){
  $('select.js_multiple_selector').change(function() {
    selected_services_counter($(this));
  });
}

function selected_services_counter(choosen_option){
  var counter_id = 'counter_for_'+choosen_option.attr('id');
  var choosen_value = choosen_option.val();
  var selected = choosen_value ? choosen_value.length : 0;
  if (selected > 0){
    $('#'+counter_id).parent().css('background-color','#E67500');
  }
  $('#'+counter_id).html(selected);
}

function preselect_definitions_when_joining(definitions, recruited_garage_services){
  var has_service = false;
  if (recruited_garage_services.length > 0 ){
    for(var i = 0; i < recruited_garage_services.length; i++){
      if (has_service) { break ; }
      var service = recruited_garage_services[i];
      has_service = (definitions.indexOf(service) > -1) && service;
      if (has_service) {
        recruited_garage_services.splice(i, 1);
      }
    }
  }
  var selected =  '';
  if (has_service){
    selected = 'selected';
  }
  return selected;
}

function count_preselected(){
  $('select.js_multiple_selector').each(function() {
    selected_services_counter($(this));
  });
}
