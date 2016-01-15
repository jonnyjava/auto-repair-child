function fill_dropdown_with_selected_option(){
  var choosen_option = $(this).text();
  var parentId = $(this).parent().data('parent-id');
  $('#'+parentId).text(choosen_option);
  $('#'+parentId+'_id').val(choosen_option);
  $('#'+parentId+'_tooltip').hide();
}

function dropdown_toggler(event){
  var dropdown_name = event.data.dropdown_id;
  var dropdown = $('#'+dropdown_name);
  dropdown.toggle();
  dropdown.dropdown('toggle');
}

function fill_radio_with_selected_option(){
  var parentId = $(this).data('parent-id');
  var choosen_option = $(this).val();
  $('#'+parentId).text(choosen_option);
  $('#'+parentId+'_id').val(choosen_option);
  $('#'+parentId+'_tooltip').hide();
}

function disable_service_dropdown(){
  $('.js_dropdown_opener').unbind('click', dropdown_toggler);
  $('#service_category_dropdown').parent().addClass('disabled-element');
  $('#service_category_disabled_label').addClass('disabled-element');
  $('#service_category_disabled_hint').show();
  $('.js_services').fadeOut(global_animation_time);
  $('#service_category_dropdown').hide();
}

function enable_service_dropdown(){
  $('#service_category_dropdown').parent().removeClass('disabled-element');
  $('#service_category_disabled_label').removeClass('disabled-element');
  $('#service_category_disabled_hint').hide();
  var selected_service_category = $('#service_category').data('value');
  if(selected_service_category != ''){
    $('.'+selected_service_category).delay(global_animation_time).fadeIn();
  }
  activate_dropdown_toggle();
}
