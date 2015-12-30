function content_for_step_is_valid(clicked_button){
  var step_is_valid = true;
  var fieldset_id = clicked_button.data('fieldset');

  var step_values = $('#'+fieldset_id).serialize()
  step_values = serialize_unchecked(fieldset_id, step_values)
  step_values = step_values.split('&');

  for( var i = 0; i < (step_values.length); i++){
    var key_value = step_values[i].split('=');
    if(key_value[0] != "comments"){
      var field = $('#'+key_value[0]);
      var value = key_value[1].trim();
      step_is_valid = (perform_dedicate_validation(field, value) && step_is_valid);
    }
  }
  return step_is_valid;
}

function perform_dedicate_validation(field, value){
  var field_is_valid = true;
  var validation_type = field.data('validation-type');
  var field_id = field.attr('id');
  switch(validation_type) {
    case 'drop_or_radio':
      field_id = field.data('parent-id');
      field_is_valid = ($('#'+field_id).text() == $('#'+field_id+'_id').val());
      break;
    case 'only_letters':
      field_is_valid = (value.length >= 10) && (/^[a-z\+]+$/i.test(value) );
      break;
    case 'phone':
      field_is_valid = (value.length >= 8) && !(value.match(/[^0-9]+/gi));
      break;
    case 'email':
      field_is_valid =  (value.length >= 6) && ((value.match(/[A-Z0-9._%+-]+%40[A-Z0-9.-]+\.[A-Z]{2,4}/gi)) != null)  ;
      break;
    case 'mandatory_check':
      field_is_valid = (value == 'Si');
      break;
    default:
      field_is_valid = (value != '');
  }

  field_is_valid ? $('#'+field_id+'_tooltip').hide() : $('#'+field_id+'_tooltip').show();
  return field_is_valid;
}

function serialize_unchecked(step, serialized){
  var serialized = $('#'+step).serialize();
    $("#"+step+" input:checkbox:not(:checked)").each(function(e){
    serialized += "&"+this.name+'=false';
  })
return serialized
}

function hide_tooltip(){
  $('.js_hide_tooltip').click(function(){
    var tooltip_id = $(this).data('parent-id')+"_tooltip";
    $('#'+tooltip_id).hide();
  });
}
