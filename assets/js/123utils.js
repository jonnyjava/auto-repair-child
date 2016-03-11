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
  var container_id = tooltip.closest('fieldset').attr('id');
  tooltip.show();
  build_error_message(tooltip);
  $('#'+field_id).addClass('error_emphasis');
  show_error_panel(container_id);
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
  if($('.'+error_name).length){
    var error_message = '<div class="col-lg-4 col-xs-12 '+error_name+'">'+tooltip.text() + "</div>";
    $('.js_form_error_list').append(error_message);
  }
}
