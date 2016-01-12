<?php
  $vin_number = $_POST['vin_number'];
  $vin_is_cached = cache_vin_if_not_exists($vin_number);
  if ($vin_is_cached){
    $response = build_json_response($vin_number);
  }
  else{
    $errors = [];
    $errors['server_answer'] = 'La pagina no responde, no existe o no contiene nada';
    $response = json_encode(array('status' => 400, 'errors' => json_encode($errors) ));
  }
echo $response;

function cache_vin_if_not_exists($vin_number){
  $allok = true;
  if (!file_exists("../vin_cache/".$vin_number.".html")) {
    $vinrequest = file_get_contents("http://en.vindecoder.pl/".$vin_number);
    if ($vinrequest != ""){
        $myfile = fopen("../vin_cache/".$vin_number.".html", "w") or die("Unable to open file!");
        fwrite($myfile, $vinrequest);
        fclose($myfile);
        $allok = true;
    }
    else{
      $allok = false;
    }
  }
  return $allok;
}

function build_json_response($vin_number){
  $doc = new DOMDocument();
  $doc->loadHTMLFile("../vin_cache/".$vin_number.".html");
  $doc->validateOnParse = true;
  $mytable = $doc->getElementsByTagName('table')[2];
  $car_details = [];
  foreach($mytable->childNodes as $nodename)
  {
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
  $response = json_encode(array('status' => 200, 'car_details' =>json_encode($car_details) ));
  return $response;
}
?>
