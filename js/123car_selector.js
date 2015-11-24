function car_selector(){
  $('#car_brand_dropdown > li').click(function(){
    $('#car_model_dropdown').empty();
    $('#car_year_dropdown').empty();

    var cardb_name = $(this).data('value')
    var cardb = eval(cardb_name);
    $('#car_brand').data('car-db', cardb_name)

    var models_options = '';
    $('#car_model').html('<i class="hint">Tu modelo:</i>');

    for(var i = 1; i<  cardb.length; i++){
      for (var j = 1; j < cardb[i].length; j++ ){
        models_options += "<li data-value='"+i+","+j+"'>"+cardb[i][j][0]+"</li>";
      }
    }
    $('#car_model_dropdown').html(models_options);
    $("#car_model_dropdown > li").bind("click", fill_dropdown_with_selected_option);
    car_model_selector();
  });
}

function car_model_selector(){
  $('#car_model_dropdown > li').click(function(){
    $('#car_year_dropdown').empty();
    var cardb = eval($('#car_brand').data('car-db'));
    $('#car_year').html('<i class="hint">Tu año:</i>');

    var model_selected = $(this).data('value').split(',');
    var i = model_selected[0];
    var j = model_selected[1];
    var years_options = '';
    for(var k = 1; k < cardb[i][j].length; k++){
      years_options += "<li data-value='"+k+"'>"+cardb[i][j][k][0]+"</li>";
    }
    $('#car_year_dropdown').html(years_options);
    $("#car_year_dropdown > li").bind("click", fill_dropdown_with_selected_option);
  });
}