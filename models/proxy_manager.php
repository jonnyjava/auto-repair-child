<?php
require '../models/vin_db_connector.php';
/*
this goes into a cron job
//require_once( 'ESTÉ DONDE ESTË wp-load.php' );
require 'models/proxy_manager.php';
$pm = new ProxyManager();
$proxies = $pm->download_proxies(8080);
*/
Class ProxyManager{
  public function __construct(){
    $this->page_to_get = "http://incloak.es/proxy-list/?maxtime=500&ports=";
    global $wpdb;
    $this->db = $wpdb;
  }

  public function download_proxies($port){
    $page = $this->get_proxies_page($port);
    $proxies = $this->scrap_proxies($page);
    $this->save_new_proxies($proxies, $port);
  }

  private function get_proxies_page($port){
    $page = $this->page_to_get.$port."&type=h";
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $page);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36');
    $contents = curl_exec($ch);
    if (curl_errno($ch)) {
      $contents = null;
    }
    curl_close($ch);
    if (!is_string($contents) || !strlen($contents)) {
      $contents = null;
    }
    return $contents;
  }

  private function scrap_proxies($page){
    $doc = new DOMDocument();
    $doc->loadHTML($page);
    $xpath = new DOMXPath($doc);
    $path = '//*[@id="tgr"]/div/table';
    $proxy_table = $xpath->query($path);
    $table_content = $proxy_table[0]->nodeValue;
    preg_match_all('/[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}/', $table_content, $proxies);
    return $proxies;
  }

  private function save_new_proxies($proxies, $port){
    $values = "";
    foreach($proxies[0] as $proxy){
      $values .= "('".$proxy.":".$port."', 0),";
    }
    $values = rtrim($values, ",");
    $query = "insert ignore into wp_proxies(ip, times_down) values ".$values.";";
    $this->db->query($query);
  }
}
?>
