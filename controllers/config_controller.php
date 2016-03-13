<?php
  require '../models/config.php';

  $config = new Config();

  if(!is_null($_GET)){//this one is for JS
    echo get_ewok_config($config);
  }

  if(isset($_POST['ewoks_url']) && isset($_POST['ewoks_token'])){
    $config->update_ewok_connection($_POST['ewoks_url'], $_POST['ewoks_token']);
    redirect_to_origin();
  }

  if(isset($_POST['rollbar_server_token']) && isset($_POST['rollbar_client_token'])){
    $config->update_rollbar_connection($_POST['rollbar_server_token'], $_POST['rollbar_client_token']);
    redirect_to_origin();
  }

  if(isset($_POST['sendinblue_token'])){
    $config->update_sendinblue_connection($_POST['sendinblue_token']);
    redirect_to_origin();
  }

  if(isset($_POST['environment_type'])){
    $config->update_environment($_POST['environment_type']);
    redirect_to_origin();
  }

  function get_ewok_config($config){
    $ewok_config = $config->get_ewok_connection();
    $url = $ewok_config['ewok_url'];
    $token = $ewok_config['ewok_token'];
    $response = json_encode(array('ewok_url' => $url, 'ewok_token' => $token ));
    return $response;
  }

  function redirect_to_origin(){
    header("Location: ".$_SERVER['HTTP_REFERER']);
  }

?>
