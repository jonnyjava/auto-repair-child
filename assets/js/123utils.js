function count_chars(filled_field){
  var field_id = filled_field.attr('id');
  $('#'+field_id+'_filled_chars').text(filled_field.val().length);
  $('#'+field_id+'_tooltip').hide();
}

function toggle_caret(){
  $('.js_toggle_caret').each(function(){
    $(this).toggle();
    $(this).parent().toggleClass('disabled-field');
  })
}
