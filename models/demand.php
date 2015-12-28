<?php
Class Demand {
  public $errorMessages = [];
  public $city = "";
  public $service_category_id = "";
  public $service_id = "";
  public $vin_number = "";
  public $brand = "";
  public $model = "";
  public $year = "";
  public $engine = "";
  public $engine_letters = "";
  public $name_and_surnames = "";
  public $phone = "";
  public $email = "";
  public $wants_newsletter = "";
  public $comments = "";
  public $demand_details = "";

  public function is_valid() {
    $object_is_valid = false;
    $object_is_valid = $this->validate_city();
    $object_is_valid = $this->validate_name_and_surnames() && $object_is_valid;
    $object_is_valid = $this->validate_phone() && $object_is_valid;
    $object_is_valid = $this->validate_email() && $object_is_valid;
    return $object_is_valid;
  }

  private function validate_city(){
    if($this->city == ''){
      $this->add_error_message('city');
      return false;
    }
    else {
      return true;
    }
  }
  private function validate_service_category_id(){
    if($this->service_category_id == '' || $this->service_category_id == '0'){
      $this->add_error_message('service_category_id');
      return false;
    }
    else {
      return true;
    }
  }
  private function validate_service_id(){
    if($this->service_id == '' || $this->service_id == '0'){
      $this->add_error_message('service_id');
      return false;
    }
    else {
      return true;
    }
  }
  private function validate_name_and_surnames(){
    if($this->name_and_surnames == ''){
      $this->add_error_message('name_and_surnames');
      return false;
    }
    else {
      return true;
    }
  }
  private function validate_phone(){
    if($this->phone == ''){
      $this->add_error_message('phone');
      return false;
    }
    else {
      return true;
    }
  }
  private function validate_email(){
    if($this->email == ''){
      $this->add_error_message('email');
      return false;
    }
    else {
      return true;
    }
  }

  private function add_error_message($type){

    switch($type){
      case 'city':
        $this->errorMessages[] = array("user_city" => "La ciudad no puede estar vacia");
        break;
      case 'name_and_surnames':
        $this->errorMessages[] = array("name_and_surnames" => "Nombre y apellidos non validos");
        break;
      case 'phone':
        $this->errorMessages[] = array("phone" => "Numero de telefono invalido");
        break;
      case 'email':
        $this->errorMessages[] = array("email" => "Mail non valida");
        break;
    }
  }
}
?>
