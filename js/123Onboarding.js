$(document).ready(function(){
  $('div').removeAttr("tabindex");
  $('.submit').click(function () {
    return false;
  });
  prevent_unwanted_submits();
});
var current_fs, next_fs, previous_fs;
var left, opacity, scale;
var animating;
$(document).ready(function(){
  $('.next').click(function (event) {
    event.preventDefault();
    animate_to_next($(this));
  });
  $('.previous').click(function () {
    animate_to_previous($(this));
  });
});

function animate_to_next(clicked_button){
  if (animating)
      return false;
  animating = true;

  var fs_id = clicked_button.data('fieldset');
  current_fs = $('#' + fs_id);
  next_fs = $('#' + fs_id).next();
  $('#progressbar li').eq($('fieldset').index(next_fs)).addClass('active');
  next_fs.show();
  current_fs.animate({ opacity: 0 }, {
      step: function (now, mx) {
          scale = 1 - (1 - now) * 0.2;
          left = now * 50 + '%';
          opacity = 1 - now;
          current_fs.css({ 'transform': 'scale(' + scale + ')' });
          next_fs.css({
              'left': left,
              'opacity': opacity
          });
      },
      duration: 800,
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
  var current_fs_id = clicked_button.data('current-fieldset');
  current_fs = $('#' + current_fs_id);
  previous_fs = $('#' + current_fs_id).prev();

  $('#progressbar li').eq($('fieldset').index(current_fs)).removeClass('active');
  previous_fs.show();
  current_fs.animate({ opacity: 0 }, {
      step: function (now, mx) {
          scale = 0.8 + (1 - now) * 0.2;
          left = (1 - now) * 50 + '%';
          opacity = 1 - now;
          current_fs.css({ 'left': left });
          previous_fs.css({
              'transform': 'scale(' + scale + ')',
              'opacity': opacity
          });
      },
      duration: 800,
      complete: function () {
          current_fs.hide();
          animating = false;
      },
      easing: 'easeInOutBack'
  });
}

function prevent_unwanted_submits(){
  $('button').click(function(event) {
    event.preventDefault();
    return false;
  });
}
