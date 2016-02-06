<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

Class VinDbConnector {
  function __construct(){
    global $wpdb;
    $this->db = $wpdb;
  }

  public function retrieve_vin_from_db($vin){
    $query = "SELECT * FROM wp_vin_lookup WHERE vin = '".$vin."'";
    $vin_stored_in_db = $this->db->get_row($query, ARRAY_A);
    return $vin_stored_in_db;
  }

  public function store_vin_in_db($vin){
    $table_name = $this->db->prefix . "vin_lookup";
    $this->db->insert( $table_name, array(
      'vin' => $vin,
      'search_flag' => 0)
    );
  }

  public function increment_search_flag_by_one($search_flag, $vin){
    $table_name = $this->db->prefix . "vin_lookup";
    $data = array('search_flag' => $search_flag+1);
    $where = array('vin' => $vin);
    $this->db->update( $table_name, $data , $where );
  }

  public function reset_search_flag($vin){
    $table_name = $this->db->prefix . "vin_lookup";
    $data = array('search_flag' => 0);
    $where = array('vin' => $vin);
    $this->db->update( $table_name, $data , $where );
  }

  public function save_parsed_details($car_details, $vin){
    $table_name = $this->db->prefix . "vin_lookup";
    $data = array('car_details' => $car_details);
    $where = array('vin' => $vin);
    $this->db->update( $table_name, $data , $where );
  }

  public function save_raw_lookup($raw_lookup, $vin){
    $table_name = $this->db->prefix . "vin_lookup";
    $data = array('raw_info' => json_encode($raw_lookup));
    $where = array('vin' => $vin);
    $this->db->update( $table_name, $data , $where );
  }

}
?>