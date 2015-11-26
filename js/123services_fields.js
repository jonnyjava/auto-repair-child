$(document).ready(function(){
  $('.js_servicename').click(function(event){
      event.preventDefault();
      var absolute_url = $('#js_onboarding_container').data('partial-url');

      var fields = $(this).data('car-fields').split(',');
      var content = "";
      if (fields.length > 1){
        content += build_fixed_colums_row(fields, absolute_url, 'row');
      }

      fields = $(this).data('car-details-fields').split(',');
      if (fields.length > 1){
        content += build_fixed_colums_row(fields, absolute_url, 'row car-details-row bottom-gutter');
      }

      fields = $(this).data('service-fields').split(',');
      if (fields[0].length > 0){
        content += build_row(fields, absolute_url);
      }
      $('#js_dynamic_form').html(content);
      $(".js_dropdown_menu > li").bind("click", fill_dropdown_with_selected_option);
      car_selector();
      animate_to_next($(this));
  });

  function build_row(fields, absolute_url){
    var fields_count = fields.length;
    var content = "";
    for(var i = 0; i <fields_count; i++){
      if (fields[i] != ""){
        var page_to_load = absolute_url+"/partials/_"+fields[i]+".html";
        content += $.ajax({type: "GET", url: page_to_load, async: false}).responseText;
      }
    }
    content = "<div class='row car-details-row'>"+content+"</div>";
    return content;
  }
  function build_fixed_colums_row(fields, absolute_url, row_class){
    var content = "";
    for(var i = 0; i <fields.length; i++){
      if (fields[i] != ""){
        content += $.ajax({type: "GET", url: absolute_url+"/partials/_"+fields[i]+".html", async: false}).responseText;
      }
    }
    content = "<div class='"+row_class+"'>"+content+"</div>";
    return content;
  }
});


