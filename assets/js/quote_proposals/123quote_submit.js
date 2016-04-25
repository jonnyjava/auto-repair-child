function submit_quote_status(clicked_button){
  var quote_token = $('#quote_token').val();
  if (quote_token && quote_token.length == 40) {
    var submitted_datas = 'status='+clicked_button.val();
    var destination_url = '/quote_proposals/'+quote_token+'.json';
    var choice = clicked_button.val();
    var callback = (choice == 'refused') ? hide_garage_data : fill_garage_data;
    show_preloader();
    send_to_api(submitted_datas, destination_url, 'PATCH', callback, load_error_page);
  }
  else{
   load_error_page();
  }
  setTimeout(function(){
    animate_container_height($('#step_2'));
  }, global_animation_time);
}
