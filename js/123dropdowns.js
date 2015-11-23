$(document).ready(function(){
  $('.js_dropdown_menu > li').click(function(){
    var choosen_option = $(this).text();
    var parentId = $(this).parent().data('parent-id');
    $('#'+parentId).text(choosen_option);
    var animation_time = 400;
    $('.js_services').fadeOut(animation_time);
    $('.' + $(this).data('value')).delay(animation_time).fadeIn();
  });
});
