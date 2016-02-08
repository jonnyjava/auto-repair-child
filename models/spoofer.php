<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

Class Spoofer{

  function __construct(){
    global $wpdb;
    $this->db = $wpdb;
  }

  public function get_proxy(){
    return $this->get_valid_proxy();
  }

  private function get_valid_proxy(){
    $proxy = $this->get_proxy_from_db();
    $proxy_ip = $proxy['ip'];
    $proxy_is_up = $this->proxy_is_available($proxy_ip);
    if (!$proxy_is_up){
      $this->increment_proxy_down_counter($proxy);
      $proxy_ip = $this->get_valid_proxy();
    }
    return $proxy_ip;
  }

  private function get_proxy_from_db(){
    $query = "select * from wp_proxies order by rand() limit 1";
    $proxy = $this->db->get_row($query, ARRAY_A);
    return $proxy;
  }

  private function proxy_is_available($proxy){
    $ip = explode(":", $proxy)[0];
    $port = explode(":", $proxy)[1];
    $proxy_is_up = true;
    $socket = fSockOpen($ip, $port, $errno, $errstr, 10);
    if (!$socket) {
      $proxy_is_up = false;
    }
    else{
      fclose($socket);
    }
    return $proxy_is_up;
  }

  private function increment_proxy_down_counter($proxy){
    $table_name = $this->db->prefix . "proxies";
    $data = array('times_down' => $proxy['times_down']+1);
    $where = array('ip' => $proxy['ip']);
    $this->db->update( $table_name, $data , $where );
  }
}
?>
