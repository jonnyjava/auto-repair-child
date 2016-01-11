function activate_vin_number_search(){
  $('#vin_number_searcher').click(function(){
    var my_destination = $('#onboarding_form').attr('action');
    //var vin_number = $('#vin_number').val().toUpperCase();
    //var serialized_datas = 'vin_number='+vin_number;

    var serialized_datas ="vin_number=WF05XXGCD56R45366";
    $.ajax({type: 'GET', data: serialized_datas, url: my_destination, async: true}).success(function(response){
      console.log("---> "+response);
    }).error(function(parsed_response){
      $('.js_detail_toggler').click();
    });
  });
}
