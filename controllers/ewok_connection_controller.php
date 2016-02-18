<?php
  require('../private/constants.php');
  $constants = get_costants();
  $url = $constants['ewoks_API_url'];
  $token = $constants['ewoks_API_key'];
  $response = json_encode(array('url' => $url, 'token' => $token ));
  echo $response;
?>