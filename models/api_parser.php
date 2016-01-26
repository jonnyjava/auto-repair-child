<?php
Class ApiParser{

  public function extract_raw_lookup($api_response, $vin){
    $raw_info = [];
    $doc = new DOMDocument();
    $doc->preserveWhiteSpace = false;
    $doc->loadHTMLFile("../vin_cache/".$vin.".html");
    $doc->validateOnParse = true;
    $mytables = $doc->getElementsByTagName('table');
    foreach ($mytables as $table){
      $raw_info[] = $this->extract_DOM_inner_HTML($table);
    }
    return $raw_info;
  }

  public function parse_api_response($api_response, $vin){
    $car_details = [];
    $doc = new DOMDocument();
    $doc->loadHTMLFile("../vin_cache/".$vin.".html");
    $doc->validateOnParse = true;
    $mytable = $doc->getElementsByTagName('table')[2];
    foreach($mytable->childNodes as $nodename){
      switch ($nodename->childNodes[0]->nodeValue) {
        case 'Make':
          $car_details['brand'] = $nodename->childNodes[1]->nodeValue;
          break;
        case 'Model':
          $car_details['model'] = $nodename->childNodes[1]->nodeValue;
          break;
        case 'Model year':
          $car_details['year'] = $nodename->childNodes[1]->nodeValue;
          break;
        case 'Engine type':
          $car_details['engine'] = $nodename->childNodes[1]->nodeValue;
          break;
      }
    }
    if (isset($car_details) && count($car_details) > 0 ){
      $car_details = json_encode($car_details);
    }
    else{
      $car_details = [];
    }
    return $car_details;
  }

  private function extract_DOM_inner_HTML($element){
    $innerHTML = "";
    $children  = $element->childNodes;
    foreach ($children as $child){
      $extracted_raw_Html = "";
      $extracted_raw_Html = $element->ownerDocument->saveHTML($child);
      $extracted_raw_Html = trim(strip_tags($extracted_raw_Html));
      $extracted_raw_Html = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "", $extracted_raw_Html);
      $extracted_raw_Html = str_replace("\n", " - ", $extracted_raw_Html);
      $innerHTML .= $extracted_raw_Html;
    }
    return $innerHTML;
  }
}
?>
