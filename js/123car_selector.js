function car_selector(){
  $('#car_brand').change(function(){
    $('#car_model').empty();
    $('#car_year').empty();
    var cardb = eval($(this).val());
    var models_options = '<option value="" disabled="" selected="">Elije tu modelo de coche</option>';
    for(var i = 1; i<  cardb.length; i++){
      for (var j = 1; j < cardb[i].length; j++ ){
        models_options += "<option value='"+i+","+j+"'>"+cardb[i][j][0]+"</option>";
      }
    }
    $('#car_model').html(models_options);
  });

  $('#car_model').change(function(){
    $('#car_year').empty();
    var cardb = eval($('#car_brand').val());
    var model_selected = $(this).val().split(',');
    var years_options = '<option value="" disabled="" selected="">Elije el año de tu coche</option>';
    var i = model_selected[0];
    var j = model_selected[1];
    for(var k = 1; k < cardb[i][j].length; k++){
      years_options += "<option value='"+k+"'>"+cardb[i][j][k][0]+"</option>";
    }
    $('#car_year').html(years_options);
  });
}
