<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
/*
//require_once( 'ESTÉ DONDE ESTË wp-load.php' );
require 'models/spoofer.php';
$spoofer = new Spoofer();
$spoofer->checkAllProxies();
*/

Class Spoofer{

  function __construct(){
    global $wpdb;
    $this->db = $wpdb;
  }

  public function get_proxy(){
    return $this->get_valid_proxy();
  }

  public function checkAllProxies(){
    $proxies = $this->getAllProxies();
    foreach($proxies as $proxy){
      $ip = $proxy['ip'];
      $proxy_is_up = $this->proxy_is_available($ip);
      if (!$proxy_is_up){
        $this->increment_proxy_down_counter($proxy);
      }
    }
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
    $query = "SELECT ip FROM wp_proxies WHERE times_down = (SELECT MIN(times_down) FROM wp_proxies) ORDER BY rand() limit 1";
    $proxy = $this->db->get_row($query, ARRAY_A);
    return $proxy;
  }

  private function getAllProxies(){
    $query = "SELECT ip FROM wp_proxies ORDER BY times_down";
    $proxies = $this->db->get_results($query, ARRAY_A);
    return $proxies;
  }

  private function proxy_is_available($proxy){
    $ip = explode(":", $proxy)[0];
    $port = explode(":", $proxy)[1];
    $proxy_is_up = true;
    $socket = fSockOpen($ip, $port, $errno, $errstr, 5);
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
