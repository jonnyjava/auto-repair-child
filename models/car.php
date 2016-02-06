<?php
Class Car{

  public function __construct(){
    $this->brand = null;
    $this->model = null;
    $this->year = null;
    $this->engine = null;
  }

  public function details_as_array(){
    return array_filter((array) $this);
  }
}
?>