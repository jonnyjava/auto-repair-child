function fill_problem_breadcrumb(problem){
  var breadcrumb = $('#problem_breadcrumb');
  var service_category = $('#service_category').text();
  var service = '';
  if (service_category !== problem){
    service = ' > ' + problem;
  }
  breadcrumb.text(service_category+service);
  show_breadcrumb(breadcrumb);
}

function fill_car_breadcrumb(){
  var breadcrumb = $('#car_breadcrumb');
  var car_brand = retrieve_text($('#car_brand'));
  var car_model = retrieve_text($('#car_model'));
  var car_year = retrieve_text($('#car_year'));
  var breadcrumb_text = car_brand
  if(car_model !== ''){
    breadcrumb_text += ' > ' +car_model;
    if (car_year !== ''){
      breadcrumb_text += ' > ' +car_year;
    }
  }
  if(breadcrumb_text.trim().length <1){
    breadcrumb_text = 'Cualquiera';
  }
  breadcrumb.text(breadcrumb_text);
  show_breadcrumb(breadcrumb);
}

function undo_problem_breadcrumb(){
  var breadcrumb = $('#problem_breadcrumb');
  hide_breadcrumb(breadcrumb);
}

function undo_car_breadcrumb(){
  var breadcrumb = $('#car_breadcrumb');
  hide_breadcrumb(breadcrumb);
}

function show_breadcrumb(breadcrumb){
  breadcrumb.animate({
    opacity: 1,
    left: '1px'
  }, global_slinding_time, function() {  });
}

function hide_breadcrumb(breadcrumb){
  breadcrumb.animate({
    opacity: 0,
    left: '-2000px'
  }, global_slinding_time, function() {  });
}

function retrieve_text(element){
  var text = element.clone().children().remove().end().text();
  return text;
}
