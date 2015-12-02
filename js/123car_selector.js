function car_selector(){
  $('#car_brand_dropdown > li').click(function(){
    var cardb_name = $(this).data('value')
    var cardb = eval(cardb_name);
    $('#car_brand').data('car-db', cardb_name)
    var options = '';
    $('#car_model').html('<i class="hint">Tu modelo:</i>');
    for(var i = 1; i<  cardb.length; i++){
      for (var j = 1; j < cardb[i].length; j++ ){
        options += "<li data-value='"+i+","+j+"'>"+cardb[i][j][0]+"</li>";
      }
    }
    enable_field('model', options);
    car_model_selector();
    disable_field('year');
    disable_field('engine');
    disable_field('engine_letters');
    autoclick_if_one_option('model');
    activate_dropdown_toggle();
    prevent_unwanted_submits();
  });
}

function car_model_selector(){
  $('#car_model_dropdown > li').click(function(){
    var cardb = eval($('#car_brand').data('car-db'));
    $('#car_year').html('<i class="hint">Tu año:</i>');

    var model_selected = $(this).data('value').split(',');
    var i = model_selected[0];
    var j = model_selected[1];
    var options = '';
    for(var k = 1; k < cardb[i][j].length; k++){
      options += "<li data-value='"+i+","+j+","+k+"'>"+cardb[i][j][k][0]+"</li>";
    }
    if(options.length == 0){
      options = "<li data-value='0'>cualquiera</li>"
    }
    enable_field('year', options);
    car_year_selector();
    disable_field('engine');
    disable_field('engine_letters');
    autoclick_if_one_option('year');
    activate_dropdown_toggle();
    prevent_unwanted_submits();
  });
}

function car_year_selector(){
  $('#car_year_dropdown > li').click(function(){
    var cardb = eval($('#car_brand').data('car-db'));
    $('#car_engine').html('<i class="hint">Tu cilindrada:</i>');

    var year_selected = $(this).data('value').split(',');
    var i = year_selected[0];
    var j = year_selected[1];
    var k = year_selected[2];
    var options = '';
    for(var w = 1; w < cardb[i][j][k][1].length; w++){
      options += "<li data-value='"+i+","+j+","+k+","+w+"'>"+cardb[i][j][k][1][w]+"</li>";
    }
    if(options.length == 0){
      options = "<li data-value='0'>cualquiera</li>"
    }
    enable_field('engine', options);
    car_engine_selector();
    disable_field('engine_letters');
    autoclick_if_one_option('engine');
    activate_dropdown_toggle();
    prevent_unwanted_submits();
  });
}

function car_engine_selector(){
  $('#car_engine_dropdown > li').click(function(){
    enable_field('engine_letters');
  });
}

function enable_field(name, options){
  $('#car_'+name+'_dropdown').empty();
  $('#car_'+name+'_dropdown').html(options);
  $('#car_'+name+'_dropdown > li').bind("click", fill_dropdown_with_selected_option);
  $('#car_'+name+'_dropdown').parent().removeClass('disabled-element');
  $('#car_'+name+'_disabled_label').removeClass('disabled-element');
  $('#car_'+name+'_disabled_hint').hide();
}

function disable_field(name){
  $('#car_'+name+'_dropdown').empty();
  $('#car_'+name+'_dropdown').parent().addClass('disabled-element');
  $('#car_'+name+'_disabled_label').addClass('disabled-element');
  $('#car_'+name+'_disabled_hint').show();
}

function autoclick_if_one_option(name){
  if($('#car_'+name+'_dropdown > li').length == 1){
    $('#car_'+name+'_dropdown > li').first().click();
  }
}