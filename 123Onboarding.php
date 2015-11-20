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
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123checkbox.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123dropdowns.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123progressform.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123OnboardingSmallMQ.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123OnboardingLargeMQ.css">
<div class="onboarding_container">
  <form class="msform">
  <ul class="progressbar" id="progressbar">
    <li class="active">¿Que necesitas?</li>
    <li>Que coche tienes?</li>
    <li>Tu mecanico, YA!</li>
  </ul>
  <fieldset id="step_1">
    <h1 class="fs-title">¿Que necesitas?</h1>
    <div class="row basic_fields">
      <div class="col-md-6 text-center">
        <label for="city">Tu ciudad</label>
        <span class="twitter-typeahead" style="position: relative; display: inline-block;">
        <input type="text" id="city" placeholder="Por ejemplo: Valencia" class="custom_input" autocomplete="off" autocomplete="false" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;">
        <div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;">
          <div class="tt-dataset tt-dataset-spanish_cities"></div>
        </div>
        </span>
      </div>
      <div class="col-md-6 text-center">
        <label for="service_type">¿Que necesitas?</label>
        <div class="custom-dropdown">
          <select id="service_type">
            <option value="" disabled="" selected="">Elige un servicio</option>
            <option value="js_s0">Diagnósticos</option>
            <option value="js_s1">Batería</option>
            <option value="js_s2">Neumáticos</option>
            <option value="js_s3">Mantenimientos y aceite</option>
            <optgroup label="Chapa y Lunas">
              <option value="js_s41">Sustituciones</option>
              <option value="js_s42">Reparaciones</option>
            </optgroup>
            <option value="js_s5">Frenado</option>
            <optgroup label="Iluminación y electricidad">
              <option value="js_s61">Comfort</option>
              <option value="js_s62">Audio y multimedia</option>
            </optgroup>
            <option value="js_s7">Motor</option>
            <option value="js_s8">Escapes</option>
            <option value="js_s9">Trenes y Suspensión</option>
            <option value="js_s10">Aire Acondicionado</option>
            <option value="js_s11">Otros</option></div>
          </select>
          <input type="hidden" id="service_detail" name="service_detail" value=""/>
        </div>
      </div>
    </div>
    <div class="row services_buttons js_services js_s0">
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Avería en el motor</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Frenos</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Bateria</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Electricidad</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Suspensión</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Dirección</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Control de emisiones</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Pre-ITV</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Otro diagnóstico</button></div>
    </div>
    <div class="row services_buttons js_services js_s1">
      <div class="col-md-3"></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='budget,comment' data-fieldset="step_1">Sustitución</button></div>
      <div class="col-md-3"></div>
    </div>
    <div class="row services_buttons js_services js_s2">
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='' data-service-fields='tyres_size,rim_type,budget,number_of_tyres,comment' data-fieldset="step_1">Montaje</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='' data-service-fields='tyres_size,rim_type,number_of_tyres,comment' data-fieldset="step_1">Reparación pinchazo</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='' data-service-fields='number_of_tyres,comment' data-fieldset="step_1">Permutación</button></div>
    </div>
    <div class="row services_buttons js_services js_s3">
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='revision_constructor,comment' data-fieldset="step_1">Revisión completa</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='change_filter,comment' data-fieldset="step_1">Cambio de aceite</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Liquido refrigerante</button></div>
    </div>
    <div class="row services_buttons js_services js_s41">
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Escobillas</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='glass_type,comment' data-fieldset="step_1">Luna</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='rearview,comment' data-fieldset="step_1">Retrovisor</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='bumper,comment' data-fieldset="step_1">Parachoques</button></div>
    </div>
    <div class="row services_buttons js_services js_s42">
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Reparacion de luna</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='car_color,comment' data-fieldset="step_1">Reparacion de un golpe</button></div>
    </div>
    <div class="row services_buttons js_services js_s5">
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='brake_pads,comment' data-fieldset="step_1">Pastillas de freno</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='pad_position,comment' data-fieldset="step_1">Discos de freno</button></div>
      <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='pad_position,comment' data-fieldset="step_1">Discos y Pastillas</button></div>
    </div>
    <div class="row services_buttons js_services js_s61">
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='elevalunas,comment' data-fieldset="step_1">Cambio de elevalunas eléctrico</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Cambio de cierre centralizado</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='lamp_type,comment' data-fieldset="step_1">Cambio de faro</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='light_type,light_number,comment' data-fieldset="step_1">Cambio de lámpara</button></div>
    </div>
    <div class="row services_buttons js_services js_s62">
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Montaje amplificador</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Montaje autoradio</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Montaje altavoces</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='hifi_type,comment' data-fieldset="step_1">Montaje equipo multimedia</button></div>
    </div>
    <div class="row services_buttons js_services js_s7">
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Correa de distribucion</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Kit de distribución</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Bomba inyectora</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='injectors,service_type,comment' data-fieldset="step_1">Inyectores</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Alternador</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Bomba de dirección</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Bomba de agua</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Embrague</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Radiador refrigerante</button></div>
      <div class="col-md-2 halfgutter"></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Termostato</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='spark_plug,comment' data-fieldset="step_1">Bujías</button></div>
      <div class="col-md-2 halfgutter"></div>
    </div>
    <div class="row services_buttons js_services js_s8">
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Cambio de catalizador</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='exaust_pipe,comment' data-fieldset="step_1">Cambio de escape</button></div>
    </div>
    <div class="row services_buttons js_services js_s9">
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Equilibrado de ruedas</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Alineación paralelo</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='shock_absorber_type,comment' data-fieldset="step_1">Amortiguadores</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='keencap_type,comment' data-fieldset="step_1">Rótulas de suspensión</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='cup_type,comment' data-fieldset="step_1">Copelas de suspensión</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='bearing_assembly,comment' data-fieldset="step_1">Rodamientos</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Bomba de dirección</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Rótulas de dirección</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Vástago de dirección</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Fuelles de dirección</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Cremallera de dirección</button></div>
      <div class="col-md-4 halfgutter"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Cambio de trasmisión</button></div>
    </div>
    <div class="row services_buttons js_services js_s10">
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='air_conditioned_maintenance_type,comment' data-fieldset="step_1">Maintenimiento aire acondicionado</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Cambio de filtro habitáculo</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Cambio de compresor</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Cambio de condensador</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Cambio evaporador</button></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year,vin_number,cilindrata,letras_del_motor' data-service-fields='comment' data-fieldset="step_1">Cambio de termostato</button></div>
    </div>
    <div class="row services_buttons js_services js_s11">
      <div class="col-md-3"></div>
      <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car next js_servicename" data-car-fields='brand,model,year' data-service-fields='comment' data-fieldset="step_1">Seguir</button></div>
      <div class="col-md-3"></div>
    </div>
  </fieldset>
  <fieldset id="step_2">
    <h1 class="fs-title">Que coche tienes?</h1>
    <span id="js_dynamic_form"></span>
    <input type="button" name="previous" class="previous action-button" value="Anterior">
    <input type="button" name="next" class="next action-button" data-fieldset="step_2" value="Siguente">
  </fieldset>
  <fieldset id="step_3">
    <h1 class="fs-title">Tu mecanico, YA!</h1>
    <div class="row user_fields">
      <div class="col-md-12 text-center">
        <label for="name_and_surname">Nombre y apellidos</label>
        <input type="text" id="name_and_surname" placeholder="Jane Doe">
      </div>
      <div class="col-md-6 text-center">
        <label for="phone">Telefono</label>
        <input type="text" id="phone" placeholder="Jane Doe">
      </div>
      <div class="col-md-6 text-center">
        <label for="email">Email</label>
        <input type="text" id="email" placeholder="Jane Doe">
      </div>
      <div class="col-md-6">
        <ul class="filters">
          <li>
            <label>
              YES, i'm interested for home maintenance<br/>
              <input type="checkbox">
              <span class="icon"><i class="fa fa-check"></i></span>
            </label>
          </li>
        </ul>
      </div>
      <div class="col-md-6">
        <ul class="filters">
          <li>
            <label>
              Validation of legal aspects<br/>
              <input type="checkbox">
              <span class="icon"><i class="fa fa-check"></i></span>
            </label>
          </li>
        </ul>
      </div>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Anterior" />
    <input type="button" name="submit" class="submit action-button js_saver" data-fieldset="step_3" value="Enviar" />
  </fieldset>
  </form>

  <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
  <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123services_fields.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123car_selector.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123cars.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/123Onboarding.js" type="text/javascript"></script>
</div>
<div class="limit-wrapper">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'twentyten' ), 'after' => '' ) ); ?>
<?php edit_post_link( __( 'Edit', 'twentyten' ), '', '' ); ?>

<?php comments_template( '', true ); ?>

<?php endwhile; ?>
<?php get_footer(); ?>