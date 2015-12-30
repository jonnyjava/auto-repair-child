function content_for_step_is_valid(clickedButton){
  var stepIsValid = true;
  var fieldsetId = clickedButton.data('fieldset');

  var stepValues = $('#'+fieldsetId).serialize();
  stepValues = serialize_unchecked(fieldsetId, stepValues);
  stepValues = stepValues.split('&');

  for( var i = 0; i < (stepValues.length); i++){
    var keyValue = stepValues[i].split('=');
    if(keyValue[0] != 'comments'){
      var field = $('#'+keyValue[0]);
      var value = keyValue[1].trim();
      stepIsValid = (perform_dedicate_validation(field, value) && stepIsValid);
    }
  }
  return stepIsValid;
}

function perform_dedicate_validation(field, value){
  var fieldIsValid = true;
  var validationType = field.data('validation-type');
  var fieldId = field.attr('id');
  switch(validationType) {
    case 'drop_or_radio':
      fieldId = field.data('parent-id');
      fieldIsValid = ($('#'+fieldId).text() == $('#'+fieldId+'_id').val());
      break;
    case 'only_letters':
      fieldIsValid = (value.length >= 10) && (/^[a-z\+]+$/i.test(value) );
      break;
    case 'phone':
      fieldIsValid = (value.length >= 8) && !(value.match(/[^0-9]+/gi));
      break;
    case 'email':
      fieldIsValid =  (value.length >= 6) && is_valid_email_format(value);
      break;
    case 'mandatory_check':
      fieldIsValid = (value == 'Si');
      break;
    default:
      fieldIsValid = (value !== '');
  }

  fieldIsValid ? $('#'+fieldId+'_tooltip').hide() : $('#'+fieldId+'_tooltip').show();
  return fieldIsValid;
}

function serialize_unchecked(step, stepValues){
    $('#'+step+' input:checkbox:not(:checked)').each(function(){
    stepValues += '&'+this.name+'=false';
  })
  return stepValues;
}

function hide_tooltip(){
  $('.js_hide_tooltip').click(function(){
    var tooltipId = $(this).data('parent-id')+'_tooltip';
    $('#'+tooltipId).hide();
  });
}

function is_valid_email_format(value){
  ((value.match(/[A-Z0-9._%+-]+%40[A-Z0-9.-]+\.[A-Z]{2,4}/gi)) !== null)
}