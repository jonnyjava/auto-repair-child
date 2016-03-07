function content_for_step_is_valid(clicked_button){
  strip_html_from_fields(['comments','name_and_surnames','phone']);
  var step_values = serialize_for_validation(clicked_button);
  return step_values_are_valid(step_values);
}

function content_for_join_is_valid(clicked_button){
  strip_html_from_fields(['garage_name', 'tax_id', 'street', 'zip', 'phone']);
  var step_values = serialize_for_validation(clicked_button);
  return step_values_are_valid(step_values);
}

function strip_html_from_fields(fields){
  fields.forEach(function(field) {
    strip_html_tags(field);
  });
}

function serialize_for_validation(clicked_button){
  var fieldset_id = clicked_button.data('fieldset');
  var serialized_values = $('#'+fieldset_id).serialize();
  serialized_values = serialize_unchecked(fieldset_id, serialized_values);
  serialized_values = serialized_values.split('&');
  return serialized_values;
}

function step_values_are_valid(step_values){
  var step_is_valid = true;
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
      field_is_valid = (value.length >= 6);
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
    case 'zip':
      field_is_valid = (value.length === 5) && (/[0-9]{5}/.test(value)) ;
      break;
    case 'not_empty':
      field_is_valid = (value.length >= 6);
      break;
    case 'tax_id':
      field_is_valid = (value.length === 9) && is_valid_cif_or_nif_format(value);
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

function is_valid_cif_or_nif_format(value){
  //found here http://regexlib.com/REDetails.aspx?regexp_id=997
  return ( /^(X(-|\.)?0?\d{7}(-|\.)?[A-Z]|[A-Z](-|\.)?\d{7}(-|\.)?[0-9A-Z]|\d{8}(-|\.)?[A-Z])$/i.test(value) );
}

function phone_autoformatter(filled_field){
  var value = filled_field.val();
  var cleaned_value = value.replace(/[^0-9]+/gi, '');
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
  cleaned_input = cleaned_input.replace(/[^a-zA-Z0-9:;,]+/gi, ' ').trim();
  $('#'+field_name).val(cleaned_input);
}
