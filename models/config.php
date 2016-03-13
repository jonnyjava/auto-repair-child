<?php
$load_location = ($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
if(!file_exists($load_location)){
  $load_location = ($_SERVER['DOCUMENT_ROOT'].'/123mecanico/wp-load.php');
}

require $load_location;

Class Config{
  function __construct(){
    global $wpdb;
    $this->db = $wpdb;
    $this->table_name = 'wp_personal_config';
    $this->where = array('id' => 1);
  }

  public function get_environment(){
    $query = "SELECT environment FROM wp_personal_config LIMIT 1";
    $environment = $this->db->get_row($query, ARRAY_A);
    return $environment['environment'];
  }

  public function get_ewok_connection(){
    $query = "SELECT ewok_url, ewok_token FROM wp_personal_config LIMIT 1";
    return $this->db->get_row($query, ARRAY_A);
  }

  public function get_rollbar_connection(){
    $query = "SELECT rollbar_server_token, rollbar_client_token FROM wp_personal_config LIMIT 1";
    return $this->db->get_row($query, ARRAY_A);
  }

  public function get_sendinblue_connection(){
    $query = "SELECT sendinblue_token FROM wp_personal_config LIMIT 1";
    $sendinblue_config = $this->db->get_row($query, ARRAY_A);
    return $sendinblue_config['sendinblue_token'];
  }

  public function update_environment($environment_type){
    $data = array('environment' => $environment_type);
    $this->db->update( $this->table_name, $data, $this->where );
  }

  public function update_ewok_connection($new_url, $new_token){
    $data = array('ewok_url' => $new_url, 'ewok_token' => $new_token);
    $this->db->update( $this->table_name, $data, $this->where );
  }

  public function update_rollbar_connection($rollbar_server_token, $rollbar_client_token){
    $data = array('rollbar_server_token' => $rollbar_server_token, 'rollbar_client_token' => $rollbar_client_token);
    $this->db->update( $this->table_name, $data, $this->where );
  }

  public function update_sendinblue_connection($sendinblue_token){
    $data = array('sendinblue_token' => $sendinblue_token);
    $this->db->update( $this->table_name, $data, $this->where );
  }
}

?>
