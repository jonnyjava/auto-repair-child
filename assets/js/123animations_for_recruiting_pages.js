function show_bouncing_feedback_form(){
  $('.js_recruiting_fields').animate({
    opacity: 0,
    height: 0
  }, global_animation_time, function(){
    $('.js_recruiting_fields').hide();
    $('.js_recruiting_form').empty();
    $('.js_feedback_form').slideToggle(global_animation_time, complete_feedback_animation);
  });
}

function complete_feedback_animation(){
  animate_container_height($('#no_step'));
  animate_to_top();
  activate_feedback_form();
}
