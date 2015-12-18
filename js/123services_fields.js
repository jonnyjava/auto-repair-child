$(document).ready(function(){

  $('.js_servicename').click(function(event){
      event.preventDefault();
      var has_details = $(this).data('car-details-fields');
      var fields = $(this).data('car-fields').split(',');
      var content = "";
      var js_toggling_class = "";

      if (has_details){
        js_toggling_class = "js_toggle_details"
        content += build_row(['vin_number'], 'row car-details-row bottom-gutter');
      }

      if (fields.length > 1){
        content += build_row(fields, 'row '+js_toggling_class);
      }

      if (has_details){
        content += build_row(['engine','engine_letters'], 'row car-details-row bottom-gutter '+js_toggling_class);
      }

      fields = $(this).data('service-fields').split(',');
      if (fields[0].length > 0){
        content += build_row(fields, 'row car-details-row');
      }
      $('#js_dynamic_form').html(content);
      $(".js_dropdown_menu > li").bind("click", fill_dropdown_with_selected_option);
      activate_dropdown_toggle();
      car_selector();
      animate_to_next($(this));
      fill_problem_breadcrumb($(this).text());
      if (has_details){
        animate_details(600);
      }
  });

  function build_row(fields, row_class){
    var absolute_url = $('#js_onboarding_container').data('partial-url');
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
