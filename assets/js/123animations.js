function animate_first_step(container){
  container.animate({
   opacity: 1,
   left: '0px'
  }, global_animation_time, function() { });
}

function animate_service_dropdowns(selected_option){
  var dropdown = selected_option.parent();
  var selected_service_category = selected_option.data('value');
  $('.js_services').fadeOut(global_animation_time);
  $('.'+selected_service_category).delay(global_animation_time).fadeIn({
    duration: global_animation_time,
    start: function(){
      if((selected_service_category !== 'js_s1' ) && (selected_service_category !== 'js_s11')){
        animate_container_height($('#step_1'));
      }
    }
  });
  $('#service_category').data('value', selected_service_category);
}

function animate_to_next(clicked_button){
  if (animating){ return false; }
  animating = true;
  var fs_id = clicked_button.data('fieldset');
  current_fs = $('#' + fs_id);
  next_fs = $('#' + fs_id).next();
  $('#progressbar li').eq($('fieldset').index(next_fs)).addClass('active');
  next_fs.show();
  current_fs.animate({ opacity: 0 }, {
      step: function (now, mx) {
          if(now === 1){animate_container_height(next_fs);}
          scale = 1 - (1 - now) * 0.2;
          left = now * 50 + '%';
          opacity = 1 - now;
          current_fs.css({ 'transform': 'scale(' + scale + ')' });
          next_fs.css({
              'left': left,
              'opacity': opacity
          });
      },
      duration: global_slinding_time,
      complete: function () {
          current_fs.hide();
          animating = false;
        },
      easing: 'easeInOutBack'
  });
  animate_to_top();
}

function animate_to_previous(clicked_button){
  if (animating){ return false; }
  animating = true;
  var current_fs_id = clicked_button.data('current-fieldset');
  current_fs = $('#' + current_fs_id);
  previous_fs = $('#' + current_fs_id).prev();

  $('#progressbar li').eq($('fieldset').index(current_fs)).removeClass('active');
  previous_fs.show();
  current_fs.animate({ opacity: 0 }, {
      step: function (now, mx) {
          if(now === 1){animate_container_height(previous_fs);}
          scale = 0.8 + (1 - now) * 0.2;
          left = (1 - now) * 50 + '%';
          opacity = 1 - now;
          current_fs.css({ 'left': left });
          previous_fs.css({
              'transform': 'scale(' + scale + ')',
              'opacity': opacity
          });
      },
      duration: global_slinding_time,
      complete: function () {
          current_fs.hide();
          animating = false;
      },
      easing: 'easeInOutBack'
  });
  animate_to_top();
}

function animate_to_top(){
  $("html, body").animate({ scrollTop: 0 }, global_animation_time);
}

function animate_container_height(current_step){
  var step_height = current_step.outerHeight();
  var form_height = $('#onboarding_form').height();
  var progressbar_height = $('#progressbar').outerHeight() || 25;
  var submit_button_height = $('.js_saver').outerHeight();
  var new_height = step_height + form_height + progressbar_height + submit_button_height;
  var actual_height = $('.js_animatable_container').height();
  var min_height = $('.js_animatable_container').css('min-height');
  min_height = parseInt(min_height.substring(0, min_height.length - 2), 10);
  if (new_height < min_height){
    new_height = min_height;
  }
  if (new_height !== actual_height){
    $('.js_animatable_container').animate({
      height: new_height
    }, global_animation_time);
  }
}

function show_vin_number_search_result(message_type){
  hide_vin_line();
  show_car_details();
  show_vin_search_message(message_type);
}

function hide_vin_line(){
  disable_vin_validation();
  $('.js_vin_search_toggler').animate({
    opacity: 0,
    height: 0
  }, global_animation_time, function(){
    $('.js_vin_search_toggler').hide();
  });
}

function show_car_details(){
  $('.js_toggle_details').slideToggle(global_animation_time);
}

function show_vin_search_message(message_type){
  $('#'+message_type).show();
  $('.js_car_details_message_box').slideToggle(global_animation_time, function(){
    animate_container_height($('#step_2'));
  });
}

function hide_message_line(){
  $('.js_car_details_message_box').slideToggle(global_animation_time, function(){
    animate_container_height($('#step_2'));
  });
}

function hide_tooltip(clicked_field){
  var field_id = clicked_field.data('parent-id');
  deemphatize_error(field_id);
}

function show_preloader(){
  $('#preloader').fadeIn();
}

function hide_preloader(){
  $('#preloader').fadeOut();
}

function load_error_page(){
  $('.js_submit_result_container').html(load_partial('error_page.html'));
  show_result();
}

function show_result(){
  var clicked_button = $('.js_saver');
  animate_to_next(clicked_button);
  var next_step = clicked_button.data('next-fieldset');
  $('#progressbar').fadeOut(global_animation_time, function(){
    animate_container_height($('#'+next_step));
  });
}

function show_error_panel(container_id){
  $('.js_feedback_panel').fadeIn();
  animate_container_height($('#'+container_id));
}

function hide_error_panel_if_empty(container_id){
  var error_list = $('.js_form_error_list');
  if( ( error_list.length ) && ( error_list.html().trim() === '') ){
    $('.js_feedback_panel').hide();
    animate_container_height($('#'+container_id));
  }
}

function show_quote_landing(clicked_button){
  var title = clicked_button.data('title');
  $('.js_quote_answer_page_title').text(title);
}

function hide_garage_data(){
  $('.js_garage_data_landing').empty();
}

function hide_refuse_landing(){
  $('.js_refused_landing').empty();
}
