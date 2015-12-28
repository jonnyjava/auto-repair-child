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
      load_ko();
    });
    return false;
  });
}

function load_review_page(data){
  $('#submit_result').html(load_partial('review_wrong_info.php'));
  $('#wrong_fields_container').html( build_review_row(data.errors));

  activate_city_autocomplete();
  enable_form_submit();
  animate_result($(this));
  double_binding(data.errors);
}

function load_confirmation_page(data){
  $('#submit_result').html(load_partial('confirmation_page.php'));
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
function build_review_row(fields){
  var content = "";
  for(var i = 0; i <fields.length; i++){
    $.each(fields[i], function(key, value){
      content += "<div class='row car-details-row'>"+load_partial(key+'.html')+"</div>";
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

function load_partial(page){
  var page_to_load = absolute_url+"/partials/_"+page;
  var loaded_page = $.ajax({type: "GET", url: page_to_load, async: false}).responseText;
  return loaded_page;
}
