<?php
$vin_lookup_model = '../models/vin_lookup.php';
require $vin_lookup_model;

$vin = $_POST['vin_number'];
$response = error_response('El numero de bastidor es invalido');
if ( isset($vin) && vin_number_is_valid($vin) ){
  $car_details = '';
  $vinlookup = new VinLookup();
  $car_details = $vinlookup->retrieve_car_details_with_vin_number($vin);
  //if !car_details  $response = error_response('error a recuperar el numero de bastidor desde la API');
  $response = json_encode(array('status' => 200, 'car_details' => $car_details ));
}

echo $response;

function vin_number_is_valid($vin){
  $vin_is_valid = true;
  preg_match('/[ABCDEFGHLJKMNPRSTUVXYWZ0-9]{17}$/', $vin, $matches);//IOQÑ are not allowed
  $vin_is_valid = ( (strlen($vin) == 17) && (count($matches) > 0) );
  return $vin_is_valid;
}

function error_response($error_description){
  $errors['server_answer'] = 'La pagina no responde, no existe o no contiene nada';
  $errors['error_description'] = $error_description;
  $response = json_encode(array('status' => 400, 'errors' => json_encode($errors) ));
  return $response;
}

?>
