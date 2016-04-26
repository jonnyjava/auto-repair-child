function prefill_form(){
  var quote_token = $('#quote_token').val();
  if (quote_token && quote_token.length == 40) {
    var destination_url = '/quote_proposals/'+quote_token+'.json';
    send_to_api('', destination_url, 'GET', fill_page, load_error_page);
  }
  else{
   load_error_page();
  }
  setTimeout(function(){
    animate_container_height($('#step_1'));
  }, global_animation_time);
}

function fill_page(response){
  fill_demand_section(response.demand);
  fill_quote_section(response.quote);
}

function fill_demand_section(demand){
  $('#city').text(demand.city);
  $('#name_and_surname').text(demand.name_and_surname);
  $('#phone').text(demand.phone);
  $('#email').text(demand.email);
  $('#service').text(demand.service);
  $('#car').text(demand.car);
  $('#vin_number').text(demand.vin_number);
  $('#details').text(demand.details);
  $('#user_comments').text(demand.user_comments);
}

function fill_quote_section(quote){
  $('#price').text(quote.price);
  $('#expiration').text(quote.expiration);
  $('#proposal').text(quote.proposal);
  fill_docs(quote.docs);
}

function fill_docs(docs){
  doc1 = docs.doc1;
  doc2 = docs.doc2;
  doc3 = docs.doc3;
  if(doc1){ link_doc('doc1', doc1); }
  if(doc2){ link_doc('doc2', doc2); }
  if(doc3){ link_doc('doc3', doc3); }
}

function link_doc(name, doc){
  $('#'+name+'_file_url').attr('href', doc.file_url);
  $('#'+name+'_file_url').removeClass('hidden');
  $('#'+name+'_file_name').text(doc.file_name);
}

function fill_garage_data(response){
  var latitude = response.latitude;
  var longitude = response.longitude;
  var map_url = 'http://maps.googleapis.com/maps/api/staticmap?center='+latitude+',';
  map_url = map_url+longitude+'&zoom=18&size=768x400&sensor=true&markers=color:red%7C'+latitude+','+longitude;
  $('.js_garage_map').attr('src', map_url);
  hide_refuse_landing();
  $.each(response,function(index, value){
    if(value){
      $('#garage_'+index).text(value);
    }
    else{
      $('#garage_'+index+'_line').hide();
    }
  });
}
