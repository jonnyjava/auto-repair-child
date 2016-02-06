function car_selector(){
  $('#car_brand_dropdown > li').click(function(){
    var cardb_name = $(this).data('value');
    var cardb = eval(cardb_name);
    var options = '';

    $('#car_brand').data('car-db', cardb_name);
    $('#car_model').html('<i class="hint">Tu modelo:</i>');
    for(var i = 1; i<  cardb.length; i++){
      for (var j = 1; j < cardb[i].length; j++ ){
        options += "<li data-value='"+i+","+j+"'>"+cardb[i][j][0]+"</li>";
      }
    }
    enable_field('model', options);
    $('#car_brand_tooltip').hide();
    car_model_selector();
    disable_field('year');
    disable_field('engine');
    disable_field('engine_letters');
    autoclick_if_one_option('brand', 'model');
    activate_dropdown_toggle();
  });
}

function car_model_selector(){
  $('#car_model_dropdown > li').click(function(){
    var cardb = eval($('#car_brand').data('car-db'));
    var model_selected = $(this).data('value').split(',');
    var i = model_selected[0];
    var j = model_selected[1];
    var options = '';

    $('#car_year').html("<i class='hint'>Tu año:</i>");
    for(var k = 1; k < cardb[i][j].length; k++){
      options += "<li data-value='"+i+","+j+","+k+"'>"+cardb[i][j][k][0]+"</li>";
    }
    if(options.length == 0){
      options = "<li data-value='0'>cualquiera</li>";
    }
    enable_field('year', options);
    $('#car_model_tooltip').hide();
    car_year_selector();
    disable_field('engine');
    disable_field('engine_letters');
    autoclick_if_one_option('model', 'year');
    activate_dropdown_toggle();
  });
}

function car_year_selector(){
  $('#car_year_dropdown > li').click(function(){
    var cardb = eval($('#car_brand').data('car-db'));
    var year_selected = $(this).data('value').split(',');
    var i = year_selected[0];
    var j = year_selected[1];
    var k = year_selected[2];
    var options = '';

    $('#car_engine').html("<i class='hint'>Tu cilindrada:</i>");
    for(var w = 1; w < cardb[i][j][k][1].length; w++){
      options += "<li data-value='"+i+","+j+","+k+","+w+"'>"+cardb[i][j][k][1][w]+"</li>";
    }
    if(options.length === 0){
      options = "<li data-value='0'>cualquiera</li>"
    }
    enable_field('engine', options);
    $('#car_year_tooltip').hide();
    car_engine_selector();
    disable_field('engine_letters');
    autoclick_if_one_option('year', 'engine');
    activate_dropdown_toggle();
  });
}

function car_engine_selector(){
  $('#car_engine_dropdown > li').click(function(){
    enable_field('engine_letters');
    $('#car_engine_tooltip').hide();
  });
}

function enable_field(name, options){
  $('#car_'+name+'_tooltip').hide();
  $('#car_'+name+'_dropdown').empty();
  $('#car_'+name+'_dropdown').html(options);
  $('#car_'+name+'_dropdown > li').bind("click", fill_dropdown_with_selected_option);
  $('#car_'+name+'_dropdown').parent().removeClass('disabled-element');
  $('#car_'+name+'_disabled_label').removeClass('disabled-element');
  $('#car_'+name+'_disabled_hint').hide();
  animate_container_height($('#step_2'));
}

function disable_field(name){
  $('#car_'+name).empty();
  $('#car_'+name+'_dropdown').empty();
  $('#car_'+name+'_dropdown').parent().addClass('disabled-element');
  $('#car_'+name+'_disabled_label').addClass('disabled-element');
  $('#car_'+name+'_disabled_hint').show();
}

function autoclick_if_one_option(ancestor_name, name){
  if($('#car_'+name+'_dropdown > li').length === 1){
    $('#car_'+ancestor_name+'_dropdown').addClass('untoggleable');
    $('#car_'+name+'_dropdown > li').first().click();
  }
}
