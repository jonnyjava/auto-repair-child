function prefill_form(){
  var recruitable_token = $('#token').val();
  if (recruitable_token && recruitable_token.length == 40) {
    var destination_url = '/garage_recruitables/'+recruitable_token+'.json';
    send_to_api('', destination_url, 'GET', recruitable_lookup, delete_wrong_token);
  }
}

function recruitable_lookup(data){
  data.message ? load_already_registered_page() : prefill_fields(data);
}

function prefill_fields(data){
  $.each( data, function( key, value ) {
    $('#'+key).val(value);
  });
}

function delete_wrong_token(){
  $('#token').val('');
}

function load_already_registered_page(){
  $('.js_submit_result_container').html(load_partial('already_registered.html'));
  show_result();
}
