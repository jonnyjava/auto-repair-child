function submit_feedback_form(){
  var form = $('#bouncing_feedback_form');
  var submitted_datas = form.serialize();
  var reloading_target = form.data('destination');
  var my_destination = global_server_url + '/controllers/feedback_controller.php';
  show_preloader();
  $.ajax({type: 'POST', data: submitted_datas, url: my_destination, async: true}).always(function(){
    hide_preloader();
    window.location.href = reloading_target;
  });
  return false;
}
