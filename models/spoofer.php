<?php
Class Spoofer{
  public function get_proxy(){
    $proxies = $this->get_proxies_list();
    $proxy = null;
    if (isset($proxies)) {
      $proxy = $proxies[array_rand($proxies)];
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
    $proxies[] = '107.151.152.218:80';
    $proxies[] = '122.193.14.105:80';
    $proxies[] = '200.86.219.33:80';
    $proxies[] = '211.143.146.230:80';
    $proxies[] = '107.151.152.218:80';
    $proxies[] = '107.151.152.210:80';
    $proxies[] = '120.198.231.88:80';
    $proxies[] = '120.198.231.87:80';
    $proxies[] = '211.143.146.230:80';
    $proxies[] = '218.106.96.200:80';
    $proxies[] = '51.254.132.238:80';
    $proxies[] = '112.25.41.136:80';
    $proxies[] = '107.151.152.218:80';
    $proxies[] = '122.193.14.104:80';
    $proxies[] = '122.225.106.35:80';
    $proxies[] = '218.106.96.204:80';
    $proxies[] = '122.193.14.105:80';
    $proxies[] = '218.106.96.211:80';
    $proxies[] = '115.238.225.26:80';
    return $proxies;
  }
}
?>