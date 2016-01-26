function content_for_step_is_valid(clicked_button){
  var step_is_valid = true;
  var fieldset_id = clicked_button.data('fieldset');
  strip_html_tags('comments');
  strip_html_tags('name_and_surnames');
  strip_html_tags('phone');
  var step_values = $('#'+fieldset_id).serialize();
  step_values = serialize_unchecked(fieldset_id, step_values);
  step_values = step_values.split('&');
  for( var i = 0; i < (step_values.length); i++){
    var keyValue = step_values[i].split('=');
    if(keyValue[0] !== 'comments'){
      var field = $('#'+keyValue[0]);
      var value = keyValue[1].trim();
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
      field_is_valid = ($('#'+field_id).text() === $('#'+field_id+'_id').val());
      break;
    case 'address':
      field_is_valid = (value.length >= 6) && ( /^[\+a-zA-Z0-9%]+$/i.test(value) );
      break;
    case 'only_letters':
      field_is_valid = (value.length >= 10) && (/^[a-z\+]+$/i.test(value) );
      break;
    case 'vin_number':
      field_is_valid = /^[^\WIOQÑioqñ]{17}$/.test(value);//IOQÑ are not allowed
      break;
    case 'phone':
      field_is_valid = (value.length >= 8) && !(value.match(/[^0-9]+/gi));
      break;
    case 'email':
      field_is_valid =  (value.length >= 6) && is_valid_email_format(value);
      break;
    case 'mandatory_check':
      field_is_valid = (value === 'Si');
      break;
    default:
      field_is_valid = true;
  }

  field_is_valid ? $('#'+field_id+'_tooltip').hide() : $('#'+field_id+'_tooltip').show();
  return field_is_valid;
}

function serialize_unchecked(step, step_values){
    $('#'+step+' input:checkbox:not(:checked)').each(function(){
    step_values += '&'+this.name+'=false';
  });
  return step_values;
}

function is_valid_email_format(value){
  return (value.match(/[A-Z0-9._%+-]+%40[A-Z0-9.-]+\.[A-Z]{2,4}/gi) !== null);
}

function phone_autoformatter(filled_field){
  var value = filled_field.val();
  var cleaned_value = value.match(/[0-9]+/gi);
  if (cleaned_value !== null){
    filled_field.val(cleaned_value);
  }
  else{
    filled_field.val('');
  }
}

function strip_html_tags(field_name){
  var dirty_input = $('#'+field_name).val();
  var cleaned_input = '';
  var tmp = document.createElement('DIV');
  tmp.innerHTML = dirty_input.replace('src', '');
  cleaned_input = (tmp.textContent || tmp.innerText  || '');
  cleaned_input = cleaned_input.replace(/\W/gi, ' ').trim();
  $('#'+field_name).val(cleaned_input);
}
