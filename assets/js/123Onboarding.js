var current_fs, next_fs, previous_fs;
var left, opacity, scale;
var animating;

$(document).ready(function(){
  absolute_url = $('#js_onboarding_container').data('partial-url');

  var content = build_row(['user_city', 'service_category'], 'row');
  $('#js_dynamic_form_first_step').html(content);
  activate_service_dropdown();
  enable_service_buttons();

  content = build_row(['name_and_surnames'], 'row car-details-row');
  content += build_row(['phone', 'email'], 'row car-details-row');
  $('#js_dynamic_form_third_step').html(content);

  $('div').removeAttr("tabindex");
  $('input').attr('autocomplete', 'false');
  $('input').attr('autofill', 'false');

  activate_city_autocomplete();
  $('#user_city').bind('keypress', disable_service_dropdown);
  $('#user_city').bind('typeahead:select', enable_service_dropdown);

  enable_form_submit();

  $('.next').click(function (event) {
    event.preventDefault();
    if (content_for_step_is_valid($(this))){
      animate_to_next($(this));
    }
  });

  $('.previous').click(function () {
    animate_to_previous($(this));
  });

  hide_tooltip();
  phone_formatter();
  disable_enter_key();
});

function disable_enter_key(){
  $(document).keypress(
    function(event){
     if (event.which == '13') {
        event.preventDefault();
      }
  });
}

function animate_to_next(clicked_button){
  if (animating)
      return false;
  animating = true;
  var animation_time = 650;
  var fs_id = clicked_button.data('fieldset');
  current_fs = $('#' + fs_id);
  next_fs = $('#' + fs_id).next();
  $('#progressbar li').eq($('fieldset').index(next_fs)).addClass('active');
  next_fs.show();
  current_fs.animate({ opacity: 0 }, {
      step: function (now, mx) {
          if(now == 1){animate_container_height(next_fs, animation_time);}
          scale = 1 - (1 - now) * 0.2;
          left = now * 50 + '%';
          opacity = 1 - now;
          current_fs.css({ 'transform': 'scale(' + scale + ')' });
          next_fs.css({
              'left': left,
              'opacity': opacity
          });
      },
      duration: animation_time,
      complete: function () {
          current_fs.hide();
          animating = false;
        },
      easing: 'easeInOutBack'
  });
}

function animate_to_previous(clicked_button){
  if (animating)
      return false;
  animating = true;
  var animation_time = 650;
  var current_fs_id = clicked_button.data('current-fieldset');
  current_fs = $('#' + current_fs_id);
  previous_fs = $('#' + current_fs_id).prev();

  $('#progressbar li').eq($('fieldset').index(current_fs)).removeClass('active');
  previous_fs.show();
  current_fs.animate({ opacity: 0 }, {
      step: function (now, mx) {
          if(now == 1){animate_container_height(previous_fs, animation_time);}
          scale = 0.8 + (1 - now) * 0.2;
          left = (1 - now) * 50 + '%';
          opacity = 1 - now;
          current_fs.css({ 'left': left });
          previous_fs.css({
              'transform': 'scale(' + scale + ')',
              'opacity': opacity
          });
      },
      duration: animation_time,
      complete: function () {
          current_fs.hide();
          animating = false;
      },
      easing: 'easeInOutBack'
  });
}

function animate_container_height(current_step, animation_time){
  var step_height = current_step.outerHeight();
  var form_height = $('#onboarding_form').height();
  var progressbar_height = $('#progressbar').outerHeight();
  var new_height = step_height+form_height+progressbar_height;
  var actual_height = $('.onboarding_container').height();
  var min_height = $('.onboarding_container').css('min-height')
  min_height = parseInt(min_height.substring(0, min_height.length - 2));
  if (new_height < min_height){
    new_height = min_height;
  }
  if (new_height != actual_height){
    $('.onboarding_container').animate({
      height: new_height
    },animation_time);
  }
}

function activate_details_animation(animation_time){
  $('.js_detail_toggler').click(function(){
    animate_details(animation_time);
    $('.js_car_details_message_box').hide();
  });
}
