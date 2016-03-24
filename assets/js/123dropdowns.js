function fill_dropdown_with_selected_option(){
  var choosen_option_text = $(this).text();
  var parent_id = $(this).parent().data('parent-id');
  fill_hidden_fields($(this), choosen_option_text, parent_id);
  deemphatize_error(parent_id);
}

function dropdown_toggler(event){
  event.stopPropagation();
  var the_clicked_dropdown = $('#'+event.data.dropdown_id);
  $('.js_dropdown_menu').each(function(){
    if( $(this).is(the_clicked_dropdown) && !$(this).hasClass('untoggleable') ){
      $(this).toggle();
      $(this).dropdown('toggle');
    }
    else{
      $(this).hide();
    }
    $(this).removeClass('untoggleable');
  });
}

function fill_radio_with_selected_option(){
  var parent_id = $(this).data('parent-id');
  var choosen_option_text = $(this).val();
  fill_hidden_fields($(this), choosen_option_text, parent_id);
  deemphatize_error(parent_id);
}

function fill_hidden_fields(choosen_option, text, parent_id){
  $('#'+parent_id).text(text);
  $('#'+parent_id+'_name').val(text);
  $('#'+parent_id+'_id').val(choosen_option.attr('id'));
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
  if(selected_service_category !== ''){
    $('.'+selected_service_category).delay(global_animation_time).fadeIn();
  }
  activate_dropdown_toggle();
}

function dropdown_autoclose(event){
  clicked_element_classes = event.currentTarget.activeElement.attributes.class.nodeValue;
  var is_a_dropdown_opener = /js_dropdown_opener/gi.test(clicked_element_classes);
  if(!is_a_dropdown_opener){
    $('.js_dropdown_menu').hide();
  }
}
