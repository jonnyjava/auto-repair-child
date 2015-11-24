$(document).ready(function(){
  $(".js_dropdown_menu > li").bind("click", fill_dropdown_with_selected_option);
  $('#service_type_dropdown > li').click(function(){
    var animation_time = 400;
    $('.js_services').fadeOut(animation_time);
    $('.' + $(this).data('value')).delay(animation_time).fadeIn();
  });
});

function fill_dropdown_with_selected_option(){
  var choosen_option = $(this).text();
  var parentId = $(this).parent().data('parent-id');
  $('#'+parentId).text(choosen_option);
}
