<?php
require '../models/api_cache_builder.php';
require '../models/spoofer.php';
require('../private/constants.php');
Class ApiConnector{

  public function __construct(){
    $this->constants = get_costants();
    $this->api_cache_builder = new ApiCacheBuilder();
    $this->spoofer = new Spoofer();
  }

  public function get_car_info($vin){

    $page = null;
    $url = $this->constants['vin_API_url'];
    $this->api_cache_builder->generate_remote_cache($url, $vin);
    $page_to_get = $url.$vin;
    $api_request = $this->download_remote_vin_page($page_to_get);
    if (isset($api_request)){
      $page = fopen("../vin_cache/".$vin.".html", "w") or error_log("Unable to open file ".$vin."html!");
      fwrite($page, $api_request);
      fclose($page);
    }
    return $page;
  }

  private function download_remote_vin_page($page_to_get){
    $proxy = $this->spoofer->get_proxy();
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $page_to_get);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    $contents = curl_exec($ch);
    if (curl_errno($ch)) {
      $contents = null;
    } else {
      curl_close($ch);
    }
    if (!is_string($contents) || !strlen($contents)) {
      $contents = null;
    }
    return $contents;
  }
}
?>
