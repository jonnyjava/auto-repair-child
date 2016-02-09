function toggle_button_in_bar(clicked_button){
  $('.js_button_bar').click(function(){
    var ischecked = clicked_button.children(":first").is(":checked");
    if (ischecked){
      clicked_button.removeClass("service_btn-gray");
      clicked_button.addClass("service_btn-selected");
    }
    else{
      clicked_button.addClass("service_btn-gray");
      clicked_button.removeClass("service_btn-selected");
    }
  });
}
