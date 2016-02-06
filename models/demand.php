<?php
Class Demand {
  public $error_messages = [];
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
    $object_is_valid = $this->validate_service_category_id() && $object_is_valid;
    $object_is_valid = $this->validate_service_id() && $object_is_valid;
    $object_is_valid = $this->validate_name_and_surnames() && $object_is_valid;
    $object_is_valid = $this->validate_phone() && $object_is_valid;
    $object_is_valid = $this->validate_email() && $object_is_valid;
    return $object_is_valid;
  }

  private function validate_city(){
    $is_valid = ($this->city != '');
    if(!$is_valid){
      $this->add_error_message('city');
    }
    return $is_valid;
  }


  private function validate_service_category_id(){
    $is_valid = true;
    if($this->service_category_id == '' || $this->service_category_id == '0'){
      $this->add_error_message('service_category_id');
      $is_valid = false;
    }
    return $is_valid;
  }

  private function validate_service_id(){
    $is_valid = true;
    if($this->service_id == '' || $this->service_id == '0'){
      $this->add_error_message('service_id');
      $is_valid = false;
    }
    return $is_valid;
  }

  private function validate_name_and_surnames(){
    $is_valid = ($this->name_and_surnames != '');
    if(!$is_valid){
      $this->add_error_message('name_and_surnames');
    }
    return $is_valid;
  }

  private function validate_phone(){
    $is_valid = ($this->phone != '');
    if(!$is_valid){
      $this->add_error_message('phone');
    }
    return $is_valid;
  }

  private function validate_email(){
    $is_valid = ($this->email != '');
    if(!$is_valid){
      $this->add_error_message('email');
    }
    return $is_valid;
  }

  private function add_error_message($type){

    switch($type){
      case 'city':
        $this->error_messages[] = array("user_city" => "La ciudad no puede estar vacia");
        break;
      case 'name_and_surnames':
        $this->error_messages[] = array("name_and_surnames" => "Nombre y apellidos non validos");
        break;
      case 'phone':
        $this->error_messages[] = array("phone" => "Numero de telefono invalido");
        break;
      case 'email':
        $this->error_messages[] = array("email" => "Mail non valida");
        break;
    }
  }
}
?>
