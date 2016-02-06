<?php
require '../models/car.php';

Class ApiParser{
  public function __construct(){
    $this->car = New Car();
  }

  public function extract_raw_lookup($vin){
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

  public function parse_api_response($vin){
    $doc = new DOMDocument();
    $doc->loadHTMLFile("../vin_cache/".$vin.".html");
    $doc->validateOnParse = true;
    $mytable = $doc->getElementsByTagName('table')[2];
    $car_details = $this->extract_car_details_from_DOM($mytable);
    return $car_details;
  }

  private function extract_car_details_from_DOM($mytable){
    foreach($mytable->childNodes as $nodename){
      switch ($nodename->childNodes[0]->nodeValue) {
        case 'Make':
          $this->car->brand = $nodename->childNodes[1]->nodeValue;
          break;
        case 'Model':
          $this->car->model = $nodename->childNodes[1]->nodeValue;
          break;
        case 'Model year':
          $this->car->year = $nodename->childNodes[1]->nodeValue;
          break;
        case 'Engine type':
          $this->car->engine = $nodename->childNodes[1]->nodeValue;
          break;
      }
    }
    $car_details = $this->car->details_as_array();
    return $car_details;
  }

  private function extract_DOM_inner_HTML($element){
    $innerHTML = "";
    $children  = $element->childNodes;
    foreach ($children as $child){
      $raw_content = $element->ownerDocument->saveHTML($child);
      $innerHTML .= $this->buildInnerHtml($raw_content);
    }
    return $innerHTML;
  }

  private function buildInnerHtml($raw_content){
    $raw_content = trim(strip_tags($raw_content));
    $raw_content = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "", $raw_content);
    $raw_content = str_replace("\n", " - ", $raw_content);
    return $raw_content;
  }
}
?>
