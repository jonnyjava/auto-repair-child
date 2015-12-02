$(document).ready(function(){
  $(".js_dropdown_menu > li").bind("click", fill_dropdown_with_selected_option);
  activate_dropdown_toggle();
  $('#service_type_dropdown > li').click(function(){
    var dropdown = $(this).parent();
    var animation_time = 300;
    $('.js_services').fadeOut(animation_time);
    $('.' + $(this).data('value')).delay(animation_time).fadeIn();
  });
});

function fill_dropdown_with_selected_option(){
  var choosen_option = $(this).text();
  var parentId = $(this).parent().data('parent-id');
  $('#'+parentId).text(choosen_option);
}

function activate_dropdown_toggle(){
  $('.js_dropdown_opener').each(function(){
    $(this).unbind('click', dropdown_toggler);
    $(this).bind('click', { dropdown_id: $(this).data('dropdown-name') }, dropdown_toggler);
  });
  $('.js_dropdown_menu > li').each(function(){
    $(this).unbind('click', dropdown_toggler);
    $(this).bind('click', { dropdown_id: $(this).parent().attr('id') }, dropdown_toggler);
  });
}

function dropdown_toggler(event){
  var dropdown_name = event.data.dropdown_id;
  var dropdown = $('#'+dropdown_name);
  dropdown.toggle();
  dropdown.dropdown('toggle');
}
