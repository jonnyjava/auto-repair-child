function animate_details(animation_time){
  $('.js_toggle_details').fadeIn(animation_time);
  $('.js_vin_search_toggler').animate({
    opacity: 0,
    height: "toggle"
  }, animation_time/2, function() {
    $('.js_vin_search_toggler').hide();
    animate_container_height($('#step_2'), animation_time);
    disable_vin_validation();
  });
  $('.js_car_details_message_box').hide();
}

function animate_car_details_message_box(){
  $('.js_car_details_message_box').animate({
    opacity: 0,
    height: "toggle"
  }, 300, function() {
    animate_container_height($('#step_2'), 300);
  });
}
