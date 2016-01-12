<?php
  $vin_number = $_POST['vin_number'];
  if (!file_exists("../vin_cache/".$vin_number.".html")) {
    $vinrequest = file_get_contents("http://en.vindecoder.pl/".$vin_number);
    $myfile = fopen("../vin_cache/".$vin_number.".html", "w") or die("Unable to open file!");
    fwrite($myfile, $vinrequest);
    fclose($myfile);
  }
//$response = json_encode(array('status' => 400, 'errors' => $demand->errorMessages));

  $doc = new DOMDocument();
  $doc->loadHTMLFile("../vin_cache/".$vin_number.".html");
  $doc->validateOnParse = true;
  $mytable = $doc->getElementsByTagName('table')[2];
  $response = [];
  foreach($mytable->childNodes as $nodename)
  {
    switch ($nodename->childNodes[0]->nodeValue) {
      case 'Make':
        $response['brand'] = $nodename->childNodes[1]->nodeValue;
        break;
      case 'Model':
        $response['model'] = $nodename->childNodes[1]->nodeValue;
        break;
      case 'Model year':
        $response['year'] = $nodename->childNodes[1]->nodeValue;
        break;
      case 'Engine type':
        $response['engine'] = $nodename->childNodes[1]->nodeValue;
        break;
    }
  }
  $response = json_encode(array('status' => 200, 'car_details' =>json_encode($response) ));
  echo $response;
?>
