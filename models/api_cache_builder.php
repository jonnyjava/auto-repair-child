<?php
Class ApiCacheBuilder{

  public function __construct(){
    $this->spoofer = new Spoofer();
  }

  public function generate_remote_cache($url, $vin){
    $retry_for_problems = false;
    $proxy = $this->spoofer->get_proxy();
    $ch = curl_init();
    $ch = $this->create_curl_object($ch);
    $html = $this->get_remote_page($ch, $url, $proxy);

    if (!preg_match('/name=.token.\s+value=.([^\'"]+)/i', $html, $token)) {
      error_log('FAILED TO LOCATE HIDDEN TOKEN!');
      $retry_for_problems = true;
    }

    if (!$retry_for_problems){
      $datas = 'form[vin]='.$vin."&token=".$token[1];
      $this->post_vin_to_remote_page($ch, $datas);

      if($result === false || curl_error($ch)) {
        error_log("HOUSTON! CURL ERROR!".curl_error($ch));
        $retry_for_problems = true;
      }
    }

    curl_close ($ch);

    if($retry_for_problems){
      error_log("CAUTION! PROBABLY THIS PROXY IS DOWN ".$proxy);
      $this->generate_remote_cache($url, $vin);
    }
  }

  private function get_remote_page($ch, $url, $proxy){
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_URL, $url);
    $html = curl_exec($ch);
    return $html;
  }

  private function post_vin_to_remote_page($ch, $datas){
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    $result = curl_exec($ch);
    return $result;
  }

  private function create_curl_object($ch){
    $cookie_file_path = '../vin_cache/cookie.txt';
    $cookie_file_path = realpath($cookie_file_path);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_VERBOSE,true);
    return $ch;
  }
}
?>