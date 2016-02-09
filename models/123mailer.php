<?php
require('../vendor/Mailin.php');
require('../vendor/PHPMailer/PHPMailerAutoload.php');
require('../private/constants.php');

Class DemandMailer {

  public function __construct(){
    $this->constants = get_costants();

    $this->translations = [];
    $this->translations['budget_id'] = 'Rango de precios de la bateria';
    $this->translations['tyre_budget_id'] = 'Rango de precios de los neumaticos';
    $this->translations['rim_type_id'] = 'Tipo de llanta';
    $this->translations['tires_size_id'] = 'Medida';
    $this->translations['number_of_tyres_id'] = 'Cantidad';
    $this->translations['revision_by_brand'] = 'Revisi&oacute;n por el constructor';
    $this->translations['change_filter'] = 'Sustituci&oacute;n del filtro';
    $this->translations['glass_type_id'] = 'Tipo de luna';
    $this->translations['rearview_type_id'] = 'Tipo de retrovisor';
    $this->translations['shock_absorber_type_id'] = 'Parachoques';
    $this->translations['color'] = 'Color';
    $this->translations['brakes_id'] = 'Pastillas';
    $this->translations['brakes_disks_id'] = 'Discos';
    $this->translations['electric_glass_close_id'] = 'Elevalunas';
    $this->translations['lamp_type_id'] = 'Faro';
    $this->translations['light_type_id'] = 'Lampara';
    $this->translations['light_quantity_id'] = 'Cantidad';
    $this->translations['injector_service_category_id'] = 'Intervenci&oacute;n';
    $this->translations['injector_quantity_id'] = 'Cantidad';
    $this->translations['gas_tube_id'] = 'Tipo de escape';
    $this->translations['wheel_shock_absorber_type_id'] = 'Amortiguador';
    $this->translations['keencap_type_id'] = 'Rotula';
    $this->translations['cup_type_id'] = 'Copela';
    $this->translations['bearing_type_id'] = 'Rodamiento';
    $this->translations['air_conditioned_id'] = 'Pack de servicios';
  }

  public function send_demand_mail($demand){
    $res = $this->send_mail_with_sendinblue_api($demand);
    $result = $res['code'];
    if ($result != 'success'){
      $mail = $this->send_mail_with_gmail($demand);
      $result = $mail->send();
    }
    return $result;
  }

  private function send_mail_with_sendinblue_api($demand){
    $mailin = new Mailinblue("https://api.sendinblue.com/v2.0", $this->constants['Sendinblue_API_key']);
    $data = array(
      "id" => 3,
      "to" => $demand->email,
      "attr" => array("USERNAME"=>$demand->name_and_surnames,"SUBJECT"=>"Tu peticion de servicio en 123mecanico.es", "CONTENT" => $this->build_html_content($demand))
    );
    $res = $mailin->send_transactional_template($data);
    return $res;
  }

  private function send_mail_with_gmail($demand){
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Port = 1025; //for mailcatcher

    $mail->SMTPAuth   = $this->constants['SMTPAuth'];
    $mail->SMTPSecure = $this->constants['SMTPSecure'];
    $mail->Host       = $this->constants['Host'];
    $mail->Port       = $this->constants['Port'];
    $mail->Username   = $this->constants['Username'];
    $mail->Password   = $this->constants['Password'];

    $mail->setFrom('contact@123mecanico.com', '123Mecanico');
    $mail->addAddress($demand->email, $demand->name_and_surnames);
    $mail->addReplyTo('contact@123mecanico.com', '123Mecanico');
    $mail->isHTML(true);
    $mail->Subject = ' Tu peticion de servicio en 123mecanico.es';
    $mail->Body    = $this->build_html_content($demand);
    $mail->AltBody = $this->build_plain_text_content($demand);
    return $mail;
  }

  private function build_html_content($demand){
    $text = "<table style='font-family:Calibri,Roboto,Arial;font-size:0.8rem;padding:5px;color#000000;'>";
    $text .= $this->build_header();
    $text .= $this->build_separator();
    $text .= $this->build_step1($demand);
    $text .= $this->build_separator();
    $text .= $this->build_step2($demand);
    $text .= $this->build_separator();
    $text .= $this->build_step3($demand);
    $text .= $this->build_footer();
    $text .= "</table>";
    return $text;
  }

  private function build_separator(){
    return "<tr><td colspan='2'><hr style='border:0;height:1px;line-height:1px;background:#666666;'/></td></tr>";
  }

  private function build_header(){
    $text = "<tr><td colspan='2' style='padding:0.5em;'>";
    $text .= "Hemos recibido tu demanda y est&aacute; siendo examinada por nuestros expertos, gracias por tu confianza!<br/>";
    $text .= "Aqu&iacute; te detallamos cuales ser&aacute;n los pr&oacute;ximos pasos:";
    $text .= "<ol>";
    $text .= "<li>Hemos elegido los mejores talleres para tu demanda en tu zona y les hemos mandado tu demanda</li>";
    $text .= "<li>Estos talleres la estudiar&aacute;n</li>";
    $text .= "<li>Dentro de 5 d&iacute;as, recibir&aacute;s unos emails desde estos talleres con sus presupuestos (Recu&eacute;rdate de comprobar tu carpeta de spam!)</li>";
    $text .= "<li>A recibirlos, podr&aacute;s elegir el taller que prefieras, y despu&eacute;s de haber elegido uno, deber&aacute;s llamarlo para definir una fecha de intervenci&oacute;n.</li>";
    $text .= "<li>Durante la intervenci&oacute;n, pag&aacute;ras directamente el taller por su trabajo.</li>";
    $text .= "</ol>";
    $text .= "</td></tr>";
    return $text;
  }

  private function build_step1($demand){
    $text = $this->build_step_header('Tu necesidad',1);
    $text .= $this->build_step_row('Categoria', $demand->service_category_id);
    $text .= $this->build_step_row('Servicio', $demand->service_id);
    $text .= $this->build_details($demand);
    $text .= $this->build_step_row('Comentarios adicionales', $demand->comments);
    return $text;
  }

  private function build_step2($demand){
    $text = $this->build_step_header('Tu coche',2);
    $brand = $demand->brand;
    $model = $demand->model;
    $year = $demand->year;
    $engine = $demand->engine;

    if(strlen($brand) <1){
      $text .= $this->build_step_row('No necesitamos conocerlo.', '');
    }
    else{
      $text .= $this->build_step_row('Marca', $brand);
      $text .= $this->build_step_row('Modelo', $model);
      $text .= $this->build_step_row('Periodo', $year);
      if(strlen($engine) >1){
        $text .= $this->build_step_row('Motor', $engine." ".$demand->engine_letters);
      }
    }
    return $text;
  }

  private function build_step3($demand){
    $text = $this->build_step_header('Tus datos de contacto',3);
    $text .= $this->build_step_row('Nombre y apellidos', $demand->name_and_surnames);
    $text .= $this->build_step_row('Telefono', $demand->phone);
    $text .= $this->build_step_row('Email', $demand->email);
    return $text;
  }

  private function build_step_header($step_name, $step_number){
    $text = "<tr><td style='line-height:2rem;vertical-align:middle;color:#666666;padding:0.5em;' colspan='2'>";
    $text .= "<span style='background: #E67500;border-radius: 50%;text-align: center;display: inline-block;width:42px;height:35px;padding-top:5px;'>";
    $text .= "<span style='color: #FFFFFF;font-weight:normal;position:relative;top:2px;font-size:1.75rem;font-weight:bolder;margin-top:2px;'>".$step_number."</span>";
    $text .= "</span>";
    $text .= "<b style='position:relative;top:-2px;left:1rem;font-size:1.25rem;'>&nbsp;".$step_name."</b>";
    $text .= "</td></tr>";
    return $text;
  }

  private function build_step_row($key, $value){
    $text = "<tr><td style='width:30%;padding:0.5em;font-weight:bolder;font-size:0.85rem;'>".htmlentities($this->translate($key))."</td>";
    $text.= "<td style='width:70%;padding:0.5em;font-size:0.75rem;'>".htmlentities($value)."</td></tr>";
    return $text;
  }

  private function build_details($demand){
    $text = "";
    $details = json_decode($demand->demand_details, true);
    foreach($details as $key => $value) {
      $pos_car = strpos($key, 'car_');
      $pos_option = strpos($key, '_option');
      if(($pos_car === false)&&($pos_option === false)){
        $text .=  $this->build_step_row($key, $value);
      }
    }
    return $text;
  }

  private function build_footer(){
    $text = "<tr><td colspan='2' style='padding:0.5em;'>";
    $text .= "Si tienes alguna duda, contactanos a esta direcci&oacute;n: <a href='mailto:contact@123mecanico.es' style=' color: #E67500;text-decoration: none;cursor: pointer;'>contact@123mecanico.es</a>, te contest&aacute;ramos lo m&aacute;s r&aacute;pidamente posible.<br/>";
    $text .= "Tambi&eacute;n puedes visitar nuestra web la p&aacute;gina: <a href='http://123mecanico.es/como-funciona/' target='blank' style=' color: #E67500;text-decoration: none;cursor: pointer;'>como funciona</a> para encontrar respuestas a tus dudas.";
    $text .= "<br/><br/>El equipo de 123Mecanico.es";
    $text .= "</td></tr>";
    return $text;
  }


  private function build_plain_text_content($demand){
    $text = "Hemos recibido tu demanda y est&aacute; siendo examinada por nuestros expertos, gracias por tu confianza!\r\n";
    $text .= "Aqu&iacute; te detallamos cuales ser&aacute;n los pr&oacute;ximos pasos:\r\n";
    $text .= "Hemos elegido los mejores talleres para tu demanda en tu zona y les hemos mandado tu demanda\r\n";
    $text .= "Estos talleres la estudiar&aacute;n\r\n";
    $text .= "Dentro de 5 d&iacute;as, recibir&aacute;s unos emails desde estos talleres con sus presupuestos (Recu&eacute;rdate de comprobar tu carpeta de spam!)\r\n";
    $text .= "A recibirlos, podr&aacute;s elegir el taller que prefieras, y despu&eacute;s de haber elegido uno, deber&aacute;s llamarlo para definir una fecha de intervenci&oacute;n.\r\n";
    $text .= "Durante la intervenci&oacute;n, pagaras directamente el taller por su trabajo.\r\n";
    $text .= "\r\nTu necesidad\r\n";
    $text .= "Categoria: ". $demand->service_category_id."\r\n";
    $text .= "Servicio: ".$demand->service_id."\r\n";
    $details = json_decode($demand->demand_details, true);
    foreach($details as $key => $value) {
      $pos_car = strpos($key, 'car_');
      $pos_option = strpos($key, '_option');
      if(($pos_car === false)&&($pos_option === false)){
        $text .=  $this->translate($key).": ". $this->translate($value)."\r\n";
      }
    }
    $text .= "Comentarios adicionales: ".$demand->comments."\r\n";
    $text .= "\r\nTu coche\r\n";
    $text .= "Marca: ".$demand->brand."\r\n";
    $text .= "Modelo: ".$demand->model."\r\n";
    $text .= "Periodo: ".$demand->year."\r\n";
    $text .= "Motor: ".$demand->engine." ".$demand->engine_letters."\r\n";
    $text .= "\r\nTus datos de contacto\r\n";
    $text .= "Nombre y apellidos: ".$demand->name_and_surnames."\r\n";
    $text .= "Telefono: ".$demand->phone."\r\n";
    $text .= "Email: ".$demand->email."\r\n";
    $text .= "\r\nSi tienes alguna duda, contactanos a esta direcci&oacute;n: contact@123mecanico.es, te contest&aacute;ramos lo m&aacute;s r&aacute;pidamente posible.\r\n";
    $text .= "Tambi&eacute;n puedes visitar nuestra web la p&aacute;gina: como funciona para encontrar respuestas a tus dudas.\r\n";
    $text .= "\r\nEl equipo de 123Mecanico.es";

    $text = $this->replace_html_entities($text);
    return $text;
  }

  private function translate($value){
    $translated = $this->translations[$value] != '' ? $this->translations[$value] : $value;
    return $translated;
  }

  private function replace_html_entities($text){
    $text = str_replace("á", "a", $text);
    $text = str_replace("é", "e", $text);
    $text = str_replace("í", "i", $text);
    $text = str_replace("ó", "o", $text);
    $text = str_replace("ú", "u", $text);
    $text = str_replace("Á", "A", $text);
    $text = str_replace("É", "E", $text);
    $text = str_replace("Í", "I", $text);
    $text = str_replace("Ó", "O", $text);
    $text = str_replace("Ú", "U", $text);
    $text = str_replace("à", "a", $text);
    $text = str_replace("è", "e", $text);
    $text = str_replace("ì", "i", $text);
    $text = str_replace("ò", "o", $text);
    $text = str_replace("ù", "u", $text);
    $text = str_replace("À", "A", $text);
    $text = str_replace("È", "E", $text);
    $text = str_replace("Ì", "I", $text);
    $text = str_replace("Ò", "O", $text);
    $text = str_replace("Ù", "U", $text);
    $text = str_replace("ñ", "n", $text);
    $text = str_replace("Ñ", "N", $text);
    $text = str_replace("&aacute;", "a", $text);
    $text = str_replace("&eacute;", "e", $text);
    $text = str_replace("&iacute;", "i", $text);
    $text = str_replace("&oacute;", "o", $text);
    $text = str_replace("&uacute;", "u", $text);
    $text = str_replace("&Aacute;", "A", $text);
    $text = str_replace("&Eacute;", "E", $text);
    $text = str_replace("&Iacute;", "I", $text);
    $text = str_replace("&Oacute;", "O", $text);
    $text = str_replace("&Uacute;", "U", $text);
    $text = str_replace("&agrave;", "a", $text);
    $text = str_replace("&egrave;", "e", $text);
    $text = str_replace("&igrave;", "i", $text);
    $text = str_replace("&ograve;", "o", $text);
    $text = str_replace("&ugrave;", "u", $text);
    $text = str_replace("&Agrave;", "A", $text);
    $text = str_replace("&Egrave;", "E", $text);
    $text = str_replace("&Igrave;", "I", $text);
    $text = str_replace("&Ograve;", "O", $text);
    $text = str_replace("&Ugrave;", "U", $text);
    $text = str_replace("&ntilde;", "n", $text);
    $text = str_replace("&Ntilde;", "N", $text);
    return $text;
  }
}
?>
