<?php /* Template Name: home-with-onboarding-form */ ?>
<?php get_header(); ?>

</div>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="google" value="notranslate">
<meta content='width=device-width, initial-scale=1' name='viewport'>
<link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Nunito:400,300,700|Palanquin+Dark:400,500,600,700">
<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/bootstrap-3.3.5/css/bootstrap.min.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123Onboarding.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123buttons.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123checkbox.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123dropdowns.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123progressform.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123OnboardingSmallMQ.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123OnboardingMediumMQ.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123OnboardingLargeMQ.css">
<div class="onboarding_container" id="js_onboarding_container" data-partial-url="<?php echo bloginfo('stylesheet_directory'); ?>">
  <form class="msform" id="onboarding_form">
    <ul class="progressbar" id="progressbar">
      <li class="active">Tu problema<br/><i class="hint" id="problem_breadcrumb"></i></li>
      <li>Tu coche<br/><i class="hint" id="car_breadcrumb"></i></li>
      <li>Tu mecanico</li>
    </ul>
    <fieldset id="step_1">
      <h1 class="fs-title">¿Que necesitas?</h1>
      <div class="row">
        <div class="col-lg-2 no-lg-right-gutter">
          <label for="city" class="orange-label">Tu ciudad</label>
        </div>
        <div class="col-lg-4 no-lg-left-gutter bottom-gutter">
          <input type="text" id="city" name="city" placeholder="Por ejemplo: Valencia" tabindex="2"/>
          <div class="help"><i>indica tu ciudad o tu codigo postal</i></div>
        </div>
        <div class="col-lg-2 no-lg-right-gutter">
          <label data-dropdown-name="service_type_dropdown" class="orange-label disabled-element js_dropdown_opener" id="service_type_disabled_label">Elige un servicio</label>
        </div>
        <div class="col-lg-4 no-lg-left-gutter">
          <div class="dropdown disabled-element">
            <i class="hint" id="service_type_disabled_hint"><b>Servicios</b> disponibles en tu ciudad</i>
            <button type="button" class="btn dropdown-toggle js_dropdown_opener" data-dropdown-name="service_type_dropdown">
              <span class="dropdown-value" id="service_type" data-value=""><i class="hint">Por ejemplo: diagnósticos</i></span>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu js_dropdown_menu" data-parent-id="service_type" id="service_type_dropdown">
              <li data-value="js_s0">Diagnósticos y control</li>
              <li data-value="js_s1" class="js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='budget' data-fieldset="step_1">Sustitución de la batería</li>
              <li data-value="js_s2">Neumáticos</li>
              <li data-value="js_s3">Mantenimientos y aceite</li>
              <li data-value="js_s4">Chapa y Lunas</li>
              <li data-value="js_s5">Frenado</li>
              <li data-value="js_s61">Iluminación y electricidad</li>
              <li data-value="js_s62">Audio y multimedia</li>
              <li data-value="js_s7">Motor</li>
              <li data-value="js_s8">Escapes</li>
              <li data-value="js_s9">Trenes y Suspensión</li>
              <li data-value="js_s10">Aire Acondicionado</li>
              <li data-value="js_s11" class="js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Otros servicios</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row js_services js_s0">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Avería en el motor</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Frenos</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Bateria</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Electricidad</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Suspensión</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Dirección</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Control de emisiones</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Pre-ITV</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Otro diagnóstico</button></div>
      </div>
      <div class="row js_services js_s1">
        <div class="col-md-3"></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-car-fields='brand,model,year' data-service-fields='budget' data-fieldset="step_1">Sustitución de la batería</button></div>
        <div class="col-md-3"></div>
      </div>
      <div class="row js_services js_s2">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='' data-car-details-fields='' data-service-fields='mounting_tyres' data-fieldset="step_1">Montaje</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='' data-car-details-fields='' data-service-fields='reparing_tyres' data-fieldset="step_1">Reparación pinchazo</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='' data-car-details-fields='' data-service-fields='number_of_tyres' data-fieldset="step_1">Permutación</button></div>
      </div>
      <div class="row js_services js_s3">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='revision_constructor' data-fieldset="step_1">Revisión completa</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='change_filter' data-fieldset="step_1">Cambio de aceite</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='' data-service-fields='' data-fieldset="step_1">Liquido refrigerante</button></div>
      </div>
      <div class="row js_services js_s4">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='' data-service-fields='' data-fieldset="step_1">Escobillas</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='glass_type' data-fieldset="step_1">Luna</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='rearview' data-fieldset="step_1">Retrovisor</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='bumper' data-fieldset="step_1">Parachoques</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='' data-service-fields='' data-fieldset="step_1">Reparacion de luna</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='car_color' data-fieldset="step_1">Reparacion de un golpe</button></div>
      </div>
      <div class="row js_services js_s5">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='brake_pads' data-fieldset="step_1">Pastillas de freno</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='pad_position' data-fieldset="step_1">Discos de freno</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='pad_position' data-fieldset="step_1">Discos y Pastillas</button></div>
      </div>
      <div class="row js_services js_s61">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='elevalunas' data-fieldset="step_1">Cambio de elevalunas eléctrico</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Cambio de cierre centralizado</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='lamp_type' data-fieldset="step_1">Cambio de faro</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='light_type_and_number' data-fieldset="step_1">Cambio de lámpara</button></div>
      </div>
      <div class="row js_services js_s62">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Montaje amplificador</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Montaje autoradio</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Montaje altavoces</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='hifi_type' data-fieldset="step_1">Montaje equipo multimedia</button></div>
      </div>
      <div class="row js_services js_s7">
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Correa de distribucion</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Kit de distribución</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Bomba inyectora</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='injectors_and_services' data-fieldset="step_1">Inyectores</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Alternador</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Bomba de dirección</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Bomba de agua</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Embrague</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Radiador refrigerante</button></div>
        <div class="col-md-2 halfgutter"></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Termostato</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='spark_plug' data-fieldset="step_1">Bujías</button></div>
        <div class="col-md-2 halfgutter"></div>
      </div>
      <div class="row js_services js_s8">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Cambio de catalizador</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='exaust_pipe' data-fieldset="step_1">Cambio de escape</button></div>
      </div>
      <div class="row js_services js_s9">
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Equilibrado de ruedas</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Alineación paralelo</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='shock_absorber_type' data-fieldset="step_1">Amortiguadores</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='keencap_type' data-fieldset="step_1">Rótulas de suspensión</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='cup_type' data-fieldset="step_1">Copelas de suspensión</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='bearing_assembly' data-fieldset="step_1">Rodamientos</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Bomba de dirección</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Rótulas de dirección</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Vástago de dirección</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Fuelles de dirección</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Cremallera de dirección</button></div>
        <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Cambio de trasmisión</button></div>
      </div>
      <div class="row js_services js_s10">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='air_conditioned_maintenance_type' data-fieldset="step_1">Maintenimiento aire acondicionado</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Cambio de filtro habitáculo</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Cambio de compresor</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Cambio de condensador</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Cambio evaporador</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Cambio de termostato</button></div>
      </div>
      <div class="row js_services js_s11">
        <div class="col-md-3"></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='vin_number,cilindrata,letras_del_motor' data-service-fields='' data-fieldset="step_1">Otros servicios</button></div>
        <div class="col-md-3"></div>
      </div>
    </fieldset>
    <fieldset id="step_2">
      <h1 class="fs-title">Que coche tienes?</h1>
      <span id="js_dynamic_form"></span>
      <div class="row car-details-row">
        <div class="col-lg-12">
          <textarea id="extra_info" class="extra_info_textarea" placeholder="Quieres contarnos algo más?"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-0"></div>
        <div class="col-lg-3 col-xs-6">
          <input type="button" class="previous animation-button js_undo_problem_breadcrumb" data-current-fieldset="step_2" value="Atrás">
        </div>
        <div class="col-lg-3 col-xs-6">
        <input type="button" class="next go_next animation-button js_car_breadcrumb" data-fieldset="step_2" value="Continuar">
        </div>
        <div class="col-lg-3 col-xs-0"></div>
      </div>
    </fieldset>
    <fieldset id="step_3">
      <h1 class="fs-title">Tu mecanico, YA!</h1>
      <div class="row car-details-row">
        <div class="col-lg-4 no-lg-right-gutter">
          <label for="name_and_surname" class="orange-label">Nombre y apellidos</label>
        </div>
        <div class="col-lg-8 no-lg-left-gutter bottom-gutter">
          <input type="text" id="name_and_surname" name="name_and_surname" class="uppercased_content" >
        </div>
      </div>
      <div class="row car-details-row">
        <div class="col-lg-2 no-lg-right-gutter">
          <label for="phone" class="orange-label">Telefono</label>
        </div>
        <div class="col-lg-4 no-lg-left-gutter bottom-gutter">
          <input type="text" id="phone" name="phone" class="uppercased_content" >
        </div>
        <div class="col-lg-2 no-lg-right-gutter">
          <label for="email" class="orange-label">Email</label>
        </div>
        <div class="col-lg-4 no-lg-left-gutter bottom-gutter">
          <input type="text" id="email" name="email" class="uppercased_content" >
        </div>
      </div>
      <div class="row car-details-row">
        <div class="col-lg-6 bottom-gutter">
          <label class="orange-label">
          <span class="label-text-align">Quiero recibir la newsletter</span>
            <div class="checkbox_and_radio_container pull-right">
              <ul class="custom_checkbox">
                <li>
                  <label>
                    <input type="checkbox">
                    <span class="checkboxify icon"><i class="fa fa-check"></i></span>
                  </label>
                </li>
              </ul>
            </div>
          </label>
        </div>
        <div class="col-lg-6 bottom-gutter">
          <label class="orange-label">
          <span class="label-text-align">Acepto las condiciones</span>
            <div class="checkbox_and_radio_container pull-right">
              <ul class="custom_checkbox">
                <li>
                  <label>
                    <input type="checkbox">
                    <span class="checkboxify icon"><i class="fa fa-check"></i></span>
                  </label>
                </li>
              </ul>
            </div>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-0"></div>
        <div class="col-lg-3 col-xs-6">
          <input type="button" class="previous animation-button js_undo_car_breadcrumb" data-current-fieldset="step_3" value="Atrás">
        </div>
        <div class="col-lg-3 col-xs-6">
        <input type="button" name="submit" class="go_next animation-button js_saver" data-fieldset="step_3" value="Enviar" />
        </div>
        <div class="col-lg-3 col-xs-0"></div>
      </div>
    </fieldset>
  </form>
  <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123Onboarding.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/typeahead.bundle.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123autocomplete.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123breadcrumbs.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123dropdowns.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123services_fields.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123car_selector.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123cars.js" type="text/javascript"></script>
</div>
<div class="limit-wrapper">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>

<?php s_template( '', true ); ?>

<?php endwhile; ?>
<?php get_footer(); ?>