function animate_details(message_type, animation_time){
  hide_vin_line(animation_time);
  show_car_details(animation_time);
  show_vin_search_message(message_type, animation_time);
}

function hide_vin_line(animation_time){
  $('.js_vin_search_toggler').animate({
    opacity: 0,
    height: 0
  }, animation_time, function(){
    $('.js_vin_search_toggler').hide();
  });
}

function show_car_details(animation_time){
  $('.js_toggle_details').slideToggle(animation_time);
}

function show_vin_search_message(message_type, animation_time){
  $('#'+message_type).show();
  $('.js_car_details_message_box').slideToggle(animation_time, function(){
    animate_container_height($('#step_2'), animation_time);
  });
}

function hide_message_line(animation_time){
  $('.js_car_details_message_box').slideToggle(animation_time, function(){
    animate_container_height($('#step_2'), animation_time);
  });
}
