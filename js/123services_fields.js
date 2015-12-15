$(document).ready(function(){

  $('.js_servicename').click(function(event){
      event.preventDefault();
      var absolute_url = $('#js_onboarding_container').data('partial-url');

      var fields = $(this).data('car-fields').split(',');
      var content = "";
      if (fields.length > 1){
        content += build_row(fields, absolute_url, 'row');
      }

      fields = $(this).data('car-details-fields').split(',');
      if (fields.length > 1){
        content += build_row(fields, absolute_url, 'row car-details-row bottom-gutter');
      }

      fields = $(this).data('service-fields').split(',');
      if (fields[0].length > 0){
        content += build_row(fields, absolute_url, 'row car-details-row');
      }
      $('#js_dynamic_form').html(content);
      $(".js_dropdown_menu > li").bind("click", fill_dropdown_with_selected_option);
      activate_dropdown_toggle();
      car_selector();
      animate_to_next($(this));
      fill_problem_breadcrumb($(this).text());
  });

  function build_row(fields, absolute_url, row_class){
    var content = "";
    for(var i = 0; i <fields.length; i++){
      if (fields[i] != ""){
        var page_to_load = absolute_url+"/partials/_"+fields[i]+".html";
        content += $.ajax({type: "GET", url: page_to_load, async: false}).responseText;
      }
    }
    content = "<div class='"+row_class+"'>"+content+"</div>";
    return content;
  }
});
