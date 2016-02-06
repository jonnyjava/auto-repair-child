<?php
require '../models/api_parser.php';
require '../models/api_connector.php';
require '../models/vin_db_connector.php';

Class VinLookup {
  private $car_details = null;
  private $vin = null;

  function __construct(){
    $this->vin_db_connector = new VinDbConnector();
    $this->api_connector = new ApiConnector();
    $this->api_parser = new ApiParser();
  }

  public function retrieve_car_details_with_vin_number($vin){
    $this->vin = $vin;
    $details = [];
    $vin_stored_in_db = $this->vin_db_connector->retrieve_vin_from_db($vin);
    if (!isset($vin_stored_in_db)){
      $this->vin_db_connector->store_vin_in_db($vin);
      $details = $this->retrieve_vin_from_api();
    }
    else{
      $details = $vin_stored_in_db['car_details'];
      $search_flag = $vin_stored_in_db['search_flag'];
      if ($search_flag < 3){
        $this->vin_db_connector->increment_search_flag_by_one($search_flag, $vin);
        if (!isset($details)){
          $details = $this->retrieve_vin_from_api();
        }
      }
      if(($search_flag == 3)&&(!isset($details))){
        $this->vin_db_connector->reset_search_flag($vin);
      }
    }
    $this->car_details = $details;
    return $this->car_details;
  }

  private function retrieve_vin_from_api(){
    $car_details = [];
    $api_response = $this->api_connector->get_car_info($this->vin);
    if (isset($api_response)){
      $car_details = $this->api_parser->parse_api_response($this->vin);
      if (isset($car_details) && count($car_details) > 0 ){
        $car_details = json_encode($car_details);
        $this->vin_db_connector->save_parsed_details($car_details, $this->vin);
        $raw_lookup = $this->api_parser->extract_raw_lookup($this->vin);
        $this->vin_db_connector->save_raw_lookup($raw_lookup, $this->vin);
      }
      else{
        $car_details = $this->retrieve_car_details_with_vin_number($this->vin);
      }
      $this->delete_api_response();
    }
    else{
      $car_details = $this->retrieve_car_details_with_vin_number($this->vin);
    }
    return $car_details;
  }

  private function delete_api_response(){
    unlink("../vin_cache/".$this->vin.".html");
  }
}
?>