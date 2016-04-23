<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

require 'concerns/sanitization.php';

$demand_model = '../models/demand.php';
$mail_model = '../models/123mailer.php';
require $demand_model;
require $mail_model;

$posted_values = $_POST;

$response = '';
$demand = new Demand();
$demand->city = raw_homemade_sanitize($_POST['user_city']);
$demand->service_category_id = raw_homemade_sanitize($_POST['service_category_id']);
$demand->service_category_name = raw_homemade_sanitize($_POST['service_category_name']);
$demand->service_id = raw_homemade_sanitize($_POST['service_id']);
$demand->service_name = raw_homemade_sanitize($_POST['service_name']);
$demand->vin_number = raw_homemade_sanitize($_POST['vin_number']);
$demand->brand = raw_homemade_sanitize($_POST['car_brand_name']);
$demand->model = raw_homemade_sanitize($_POST['car_model_name']);
$demand->year = raw_homemade_sanitize($_POST['car_year_name']);
$demand->engine = raw_homemade_sanitize($_POST['car_engine_name']);
$demand->engine_letters = raw_homemade_sanitize($_POST['engine_letters']);
$demand->name_and_surnames = raw_homemade_sanitize($_POST['name_and_surnames']);
$demand->phone = raw_homemade_sanitize($_POST['phone']);
$demand->email = raw_homemade_sanitize($_POST['email']);
$demand->wants_newsletter = raw_homemade_sanitize($_POST['wants_newsletter']);
$demand->accepts_privacy = raw_homemade_sanitize($_POST['accepts_privacy']);
$demand->comments = substr(raw_homemade_sanitize($_POST['comments']), 0, 255);
$demand->demand_details = details_as_json();

if ($demand->is_valid()){
  save_demand($wpdb, $demand);
  $demand_mailer = new DemandMailer();
  $res = $demand_mailer->send_demand_mail($demand);
  $response = json_encode(array('status' => 200, 'demand' => $demand, 'result' => $res ));
}
else{
  $response = json_encode(array('status' => 400, 'errors' => $demand->error_messages));
}
echo $response;

function details_as_json(){
  $details = [];
  $basic_values = array("city", "user_city", "service_category_id", "service_category_name", "service_id", "service_name", "vin_number", "brand", "model", "year", "engine", "engine_letters", "name_and_surnames", "phone", "email", "wants_newsletter", "accepts_privacy", "comments");
  foreach ($posted_values as $key => $value) {
    if( !(in_array($key, $basic_values)) ){
      $details[$key] = raw_dirty_replace($value);
    }
  }
  return json_encode($details);
}

function save_demand($wpdb, $demand){
  $table_name = $wpdb->prefix . "demands";
  $wpdb->insert( $table_name, array(
    'city' => $demand->city,
    'service_category_id' => $demand->service_category_id,
    'service_category_name' => $demand->service_category_name,
    'service_name' => $demand->service_name,
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
