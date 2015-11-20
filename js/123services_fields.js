$('.js_servicename').click(function(){
    var fields = $(this).data('car-fields').split(',');
    var absolute_url = $('#js_onboarding_container').data('partial-url');
    var content = "";
    if (fields.length > 0){
      content += build_fixed_colums_row(fields, absolute_url);
    }

    fields = $(this).data('service-fields').split(',');
    if (fields.length > 0){
      content += build_row(fields, absolute_url);
    }
    $('#js_dynamic_form').html(content);
    car_selector();
});

function build_row(fields, absolute_url){
  var fields_count = fields.length;
  var content = "";
  for(var i = 0; i <fields_count; i++){
    if (fields[i] != ""){
      var page_to_load = absolute_url+"/partials/_"+fields[i]+".html";
      var partial = $.ajax({type: "GET", url: page_to_load, async: false}).responseText;
      var colsize = 4
      if (fields_count < 3){ colsize = Math.round(12/fields_count); }
      if (fields_count == 4){ colsize = 3; }
      else{
        if((fields_count > 4) && (i>2)){
          colsize = Math.round(12/(fields_count-3));
        }
      }
      content += "<div class='col-md-"+colsize+" text-center service_row'>"+partial+"</div>";
    }
  }
  content = "<div class='row service_details_fields'>"+content+"</div>";
  return content;
}
function build_fixed_colums_row(fields, absolute_url){
  var content = "";
  for(var i = 0; i <fields.length; i++){
    if (fields[i] != ""){
      var partial = $.ajax({type: "GET", url: absolute_url+"/partials/_"+fields[i]+".html", async: false}).responseText;
      content += "<div class='col-md-4 text-center service_row'>"+partial+"</div>";
    }
  }
  content = "<div class='row my_car_fields'>"+content+"</div>";
  return content;
}
