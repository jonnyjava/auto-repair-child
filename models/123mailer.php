<?php
require('../vendor/Mailin.php');
require('../vendor/PHPMailer/PHPMailerAutoload.php');

Class DemandMailer {
  public function send_demand_mail($demand){
    //$res = $this->send_mail_with_sendinblue_api($demand);
    $mail = $this->build_demand_mail($demand);
    $mail->send();
    $res = true;
    return $res;
  }

  private function send_mail_with_sendinblue_api($demand){
    $mailin = new Mailinblue("https://api.sendinblue.com/v2.0","rtzF60DEsBNXa7kx");
    $data = array( "to" => array($demand->email => $demand->name_and_surnames),
      "from" => array('contacto@123mecanico.es', '123mecanico'),
      "subject" => " Tu peticion de servicio en 123mecanico.es",
      "html" =>  $this->build_html_body($demand)
    );
    return $res = $mailin->send_email($data);
  }

  private function build_demand_mail($demand){
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Port = 1025;
    $mail->setFrom('contact@123mecanico.com', '123Mecanico');
    $mail->addAddress($demand->email, $demand->name_and_surnames);
    $mail->addReplyTo('contact@123mecanico.com', '123Mecanico');
    $mail->isHTML(true);
    $mail->Subject = ' Tu peticion de servicio en 123mecanico.es';
    $mail->Body    = $this->build_html_body($demand);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    return $mail;
  }

  private function build_html_body($demand){
    $text = "<table style='font-family:Calibri,Roboto,Arial;font-size:1em;padding:5px'>";
    $text .= $this->build_intro();
    $text .= $this->build_step1($demand);
    $text .= "<tr><td colspan='2'><hr/></td></tr>";
    $text .= $this->build_step2($demand);
    $text .= "<tr><td colspan='2'><hr/></td></tr>";
    $text .= $this->build_step3($demand);
    $text .= "</table>";
    return $text;
  }

  private function build_intro(){
    $text = "<tr><td colspan='2' style='padding:0.5em;'>";
    $text .= "Hemos recibido tu demanda y está siendo examinada por nuestros expertos, gracias por tu confianza!<br/>";
    $text .= "Aquí te detallamos cuales serán los próximos pasos:";
    $text .= "<ol>";
    $text .= "<li>Hemos elegido los mejores talleres para tu demanda en tu zona y les hemos mandado tu demanda</li>";
    $text .= "<li>Estos talleres la estudiarán</li>";
    $text .= "<li>Dentro de 5 días, recibirás unos emails desde estos talleres con sus presupuestos (Recuérdate de comprobar tu carpeta de spam!)</li>";
    $text .= "<li>A recibirlos, podrás elegir el taller que prefieras, y después de haber elegido uno, deberás llamarlo para definir una fecha de intervención.</li>";
    $text .= "<li>Durante la intervención, pagaras directamente el taller por su trabajo.</li>";
    $text .= "</ol>";
    $text .= "<p>";
    $text .= "Si tienes alguna duda, contactanos a esta dirección: <a href='mailto:contact@123mecanico.es' style=' color: #E67500;text-decoration: none;cursor: pointer;'>contact@123mecanico.es</a>, te contestáramos lo más rápidamente posible.<br/>";
    $text .= "También puedes visitar nuestra web la página: <a href='http://123mecanico.es/como-funciona/' target='blank' style=' color: #E67500;text-decoration: none;cursor: pointer;'>como funciona</a> para encontrar respuestas a tus dudas.";
    $text .= "</p></td></tr>";
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
    $text .= $this->build_step_row('Marca', $demand->brand);
    $text .= $this->build_step_row('Modelo', $demand->model);
    $text .= $this->build_step_row('Periodo', $demand->year);
    $text .= $this->build_step_row('Motor', $demand->engine." ".$demand->engine_letters);
    return $text;
  }

  private function build_step3($demand){
    $text = $this->build_step_header('Tus datos',3);
    $text .= $this->build_step_row('Nombre y apellidos', $demand->name_and_surnames);
    $text .= $this->build_step_row('Telefono', $demand->phone);
    $text .= $this->build_step_row('Email', $demand->email);
    return $text;
  }

  private function build_step_header($step_name, $step_number){
    $text = "<tr><td style='line-height:2rem;vertical-align:middle;color:#666666;padding:0.5em;' colspan='2'>";
    $text .= "<span style='background: #E67500;border-radius: 50%;text-align: center;display: inline-block;width:2.25em;height:2.25em'>";
    $text .= "<span style='color: #FFFFFF;font-weight: normal;position: relative;top:2px;font-size:1.75rem;font-weight:bolder;'>".$step_number."</span>";
    $text .= "</span>";
    $text .= "<b style='position:relative;top:-2px;left:1rem;font-size:1.25rem;'>".$step_name."</b>";
    $text .= "</td></tr>";
    return $text;
  }

  private function build_step_row($key, $value){
    $text = "<tr><td style='width:20%;padding:0.5em;font-weight:bolder;font-size:1rem;'>".$key."</td><td style='width:80%;padding:0.5em;font-size:0.75rem;'>".$value."</td></tr>";
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
}
?>
