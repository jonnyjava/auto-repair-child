<?php
Class Spoofer{

  function __construct(){
    $this->proxies = $this->get_proxies_list();
  }

  public function get_proxy(){
    $proxy = null;
    if (isset($this->$proxies)) {
      $proxy = $this->$proxies[array_rand($this->$proxies)];
      //$proxy = check_proxy($proxy); move this task to a cron job to check once a day the proxy list
    }
    return $proxy;
  }

  private function check_proxy($proxy){
    $ip = explode(":", $proxy)[0];
    exec("ping -c 2 $ip", $output, $status);//only for linux server
    if ($status != 0){ //this proxy is not available
      $proxy = null;
    }
    return $proxy;
  }

  private function get_proxies_list(){
    $proxies[] = '124.244.77.129:80';
    $proxies[] = '218.106.96.200:80';
    $proxies[] = '107.151.152.218:80';
    $proxies[] = '220.226.188.171:80';
    $proxies[] = '120.197.234.164:80';
    $proxies[] = '218.106.96.194:80';
    $proxies[] = '211.143.146.230:80';
    $proxies[] = '117.135.250.138:80';
    $proxies[] = '111.13.12.216:80';
    $proxies[] = '202.167.248.186:80';
    return $proxies;
  }
}
?>