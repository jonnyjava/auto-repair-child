function enable_form_submit(){
  $('.js_saver').click(function () {
    var submitted_form = $(this).closest("form")
    var my_destination = submitted_form.attr("action");
    var submitted_datas = submitted_form.serialize();
    $.ajax({type: "POST", data: submitted_datas, url: my_destination, async: true}).success(function(response){
      var parsed_response = jQuery.parseJSON(response);
      if(parsed_response.status == 400){
        load_review_page(parsed_response);
      }
      else{
        load_confirmation_page(parsed_response);
      }
    }).error(function(parsed_response){
      load_ko(parsed_response);
    });
    return false;
  });
}

function load_review_page(data){
  var absolute_url = $('#js_onboarding_container').data('partial-url');
  var page_to_load = absolute_url+"/partials/_review_wrong_info.php";
  var loaded_page = $.ajax({type: "GET", url: page_to_load, async: false}).responseText;
  $('#submit_result').html(loaded_page);

  var fields_to_review = build_review_row(data.errors, absolute_url);
  $('#wrong_fields_container').html(fields_to_review);
  activate_city_autocomplete();
  enable_form_submit();
  animate_result($(this));
  double_binding(data.errors);
}

function load_confirmation_page(data){
  console.log(data);
  var absolute_url = $('#js_onboarding_container').data('partial-url');
  var page_to_load = absolute_url+"/partials/_confirmation_page.php";
  var loaded_page = $.ajax({type: "GET", url: page_to_load, async: false}).responseText;
  $('#submit_result').html(loaded_page);
  animate_result($(this));
}

function load_ko(){
  console.log("cacca per tutti, redirect to error page");
  animate_result($(this));
}

function animate_result(clicked_button){
  animate_to_next(clicked_button);
  $('#progressbar').fadeOut(300, function(){
    animate_container_height($('#step_4'), 400);
  });
}
function build_review_row(fields, absolute_url){
  var content = "";
  for(var i = 0; i <fields.length; i++){
    $.each(fields[i], function(key, value){
      var page_to_load = absolute_url+"/partials/_"+key+".html";
      var loaded_page = $.ajax({type: "GET", url: page_to_load, async: false}).responseText;
      content += "<div class='row  car-details-row'>"+loaded_page+"</div>";
    });
  }
  return content;
}

function double_binding(fields){
  $('.js_saver').click(function () {
    for(var i = 0; i <fields.length; i++){
      $.each(fields[i], function(key, value){
        var doubled_field = $('[name="'+key+'"]');
        if(doubled_field.length > 1){
          doubled_field[0].value = doubled_field[1].value;
        }
      });
    }
  });
}
