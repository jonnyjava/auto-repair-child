<?php
$path = $_SERVER['DOCUMENT_ROOT']."123mecanico";
include_once $path . '/wp-load.php';

$demand_model = '../models/demand.php';
require $demand_model;

$response = '';
$demand = new Demand();
$demand->city = raw_homemade_sanitize($_POST['user_city']);
$demand->service_category_id = raw_homemade_sanitize($_POST['service_category_id']);
$demand->service_id = raw_homemade_sanitize($_POST['service_id']);
$demand->vin_number = raw_homemade_sanitize($_POST['vin_number']);
$demand->brand = raw_homemade_sanitize($_POST['car_brand_id']);
$demand->model = raw_homemade_sanitize($_POST['car_model_id']);
$demand->year = raw_homemade_sanitize($_POST['car_year_id']);
$demand->engine = raw_homemade_sanitize($_POST['car_engine_id']);
$demand->engine_letters = raw_homemade_sanitize($_POST['engine_letters']);
$demand->name_and_surnames = raw_homemade_sanitize($_POST['name_and_surnames']);
$demand->phone = raw_homemade_sanitize($_POST['phone']);
$demand->email = raw_homemade_sanitize($_POST['email']);
$demand->wants_newsletter = raw_homemade_sanitize($_POST['wants_newsletter']);
$demand->accepts_privacy = raw_homemade_sanitize($_POST['accepts_privacy']);
$demand->comments = raw_homemade_sanitize($_POST['comments']);
$demand->demand_details = details_as_json($_POST);

if ($demand->is_valid()){
  save($wpdb, $demand);
  $response = json_encode(array('status' => 200, 'demand' => $demand));
}
else{
  $response = json_encode(array('status' => 400, 'errors' => $demand->errorMessages));
}
echo $response;

function raw_homemade_sanitize($input) {
  $input = htmlspecialchars($input, ENT_IGNORE, 'utf-8');
  $input = strip_tags($input);
  $input = stripslashes($input);
  $input = raw_dirty_replace($input);
  $input = trim($input);
  return $input;
}

function raw_dirty_replace($input){
  $suspicious_to_replace = array("DROP", "TABLE", "DATABASE", "ALTER", "CREATE", "SELECT", "UNION", "TRUNCATE", "DELETE", "JOIN","drop", "table", "database", "alter", "create", "select", "union", "truncate", "delete", "join");
  $input = str_replace($suspicious_to_replace, "", $input);
  $undesired_chars_to_replace = array(":", ";", ")", "(", "'", "-");
  $input = str_replace($undesired_chars_to_replace, "", $input);
  $input = preg_replace('!\s+!', ' ', $input);
  return $input;
}

function details_as_json($inputs){
  $details = [];
  $basic_values = array("city", "user_city", "service_category_id", "service_id", "vin_number", "brand", "model", "year", "engine", "engine_letters", "name_and_surnames", "phone", "email", "wants_newsletter", "accepts_privacy", "comments");
  foreach ($_POST as $key => $value) {
    if( !(in_array($key, $basic_values)) ){
      $details[$key] = raw_dirty_replace($value);
    }
  }
  return json_encode($details);
}

function save($wpdb, $demand){
  $table_name = $wpdb->prefix . "demands";
  $wpdb->insert( $table_name, array(
    'city' => $demand->city,
    'service_category_id' => $demand->service_category_id,
    'service_id' => $demand->service_id,
    'vin_number' => $demand->vin_number,
    'brand' => $demand->brand,
    'model' => $demand->model,
    'year' => $demand->year,
    'engine' => $demand->engine,
    'engine_letters' => $demand->engine_letters,
    'name_and_surnames' => $demand->name_and_surnames,
    'phone' => $demand->phone,
    'email' => $demand->email,
    'wants_newsletter' => $demand->wants_newsletter,
    'accepts_privacy' => $demand->accepts_privacy,
    'comments' => $demand->comments,
    'demand_details' => $demand->demand_details)
  );
}
?>
