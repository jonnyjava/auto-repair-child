<?php
  $vin_number = $_GET['vin_number'];
  if (!file_exists("../vin_cache/".$vin_number.".html")) {
    $vinrequest = file_get_contents("http://en.vindecoder.pl/".$vin_number);
    $myfile = fopen("../vin_cache/".$vin_number.".html", "w") or die("Unable to open file!");
    fwrite($myfile, $vinrequest);
    fclose($myfile);
  }

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
  echo json_encode($response);
?>
