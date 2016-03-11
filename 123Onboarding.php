<?php /* Template Name: home-with-onboarding-form */ ?>
<?php get_header(); ?>
</div>
<?php include 'partials/shared/_header.php'; ?>
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123confirmation_page.css">
<div class="onboarding_container js_animatable_container" id="js_onboarding_container" data-partial-url="<?php echo bloginfo('stylesheet_directory'); ?>">
  <div id="preloader" class="preloader">
    <span class="loader_circle one">
      <span>1</span>
    </span>
    <span class="loader_circle two">
      <span>2</span>
    </span>
    <span class="loader_circle three">
      <span>3</span>
    </span>
    <div class="loader_text">Cargando...</div>
  </div>
  <form class="msform" id="onboarding_form" autocomplete="false" autofill="false" action="<?php echo bloginfo('stylesheet_directory');?>" method="post">
    <ul class="progressbar" id="progressbar">
      <li class="active">Tu problema<br/><i class="hint" id="problem_breadcrumb"></i></li>
      <li>Tu coche<br/><i class="hint" id="car_breadcrumb"></i></li>
      <li>Tu mecanico, YA!</li>
    </ul>
    <fieldset id="step_1">
      <h1 class="fs-title">¿Que necesitas?</h1>
      <span id="js_dynamic_form_first_step" class="first_step_container"></span>
      <div class="row js_services js_s0">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-wrench js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Avería en el motor</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-brakes js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Frenos</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-battery js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Bateria</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-insurance js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Electricidad</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-suspension js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Suspensión</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-tyre js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Dirección</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-engine js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Control de emisiones</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Pre-ITV</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-diagnostic js_servicename" data-car-details-fields='' data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Otro diagnóstico</button></div>
      </div>
      <div class="row js_services js_s1">
        <div class="col-md-3"></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-battery js_servicename" data-car-details-fields='true' data-car-fields='brand,model,year' data-service-fields='budget' data-fieldset="step_1">Sustitución de la batería</button></div>
        <div class="col-md-3"></div>
      </div>
      <div class="row js_services js_s2">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-tyre js_servicename" data-car-fields='' data-car-details-fields='' data-service-fields='mounting_tyres' data-fieldset="step_1">Montaje</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-tyre js_servicename" data-car-fields='' data-car-details-fields='' data-service-fields='reparing_tyres' data-fieldset="step_1">Reparación pinchazo</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-tyre js_servicename" data-car-fields='' data-car-details-fields='' data-service-fields='number_of_tyres' data-fieldset="step_1">Permutación</button></div>
      </div>
      <div class="row js_services js_s3">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-oil js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='revision_constructor' data-fieldset="step_1">Revisión completa</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-oil js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='change_filter' data-fieldset="step_1">Cambio de aceite</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-oil js_servicename" data-car-fields='brand,model,year' data-car-details-fields='' data-service-fields='' data-fieldset="step_1">Liquido refrigerante</button></div>
      </div>
      <div class="row js_services js_s4">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='' data-service-fields='' data-fieldset="step_1">Escobillas</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='glass_type' data-fieldset="step_1">Luna</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='rearview' data-fieldset="step_1">Retrovisor</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='bumper' data-fieldset="step_1">Parachoques</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='' data-service-fields='' data-fieldset="step_1">Reparacion de luna</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='car_color' data-fieldset="step_1">Reparacion de un golpe</button></div>
      </div>
      <div class="row js_services js_s5">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-brakes js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='brake_pads' data-fieldset="step_1">Pastillas de freno</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-brakes js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='pad_position' data-fieldset="step_1">Discos de freno</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-brakes js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='pad_position' data-fieldset="step_1">Discos y Pastillas</button></div>
      </div>
      <div class="row js_services js_s61">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='elevalunas' data-fieldset="step_1">Cambio de elevalunas eléctrico</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Cambio de cierre centralizado</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='lamp_type' data-fieldset="step_1">Cambio de faro</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='light_type_and_number' data-fieldset="step_1">Cambio de lámpara</button></div>
      </div>
      <div class="row js_services js_s62">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Montaje amplificador</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Montaje autoradio</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Montaje altavoces</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='hifi_type' data-fieldset="step_1">Montaje equipo multimedia</button></div>
      </div>
      <div class="row js_services js_s7">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Correa de distribucion</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Kit de distribución</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Bomba inyectora</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='injectors_and_services' data-fieldset="step_1">Inyectores</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Alternador</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Bomba de dirección</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Bomba de agua</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Embrague</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Radiador refrigerante</button></div>
        <div class="col-md-2"></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Termostato</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='spark_plug' data-fieldset="step_1">Bujías</button></div>
        <div class="col-md-2"></div>
      </div>
      <div class="row js_services js_s8">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Cambio de catalizador</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='exaust_pipe' data-fieldset="step_1">Cambio de escape</button></div>
      </div>
      <div class="row js_services js_s9">
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Equilibrado de ruedas</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Alineación paralelo</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='shock_absorber_type' data-fieldset="step_1">Amortiguadores</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='keencap_type' data-fieldset="step_1">Rótulas de suspensión</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='cup_type' data-fieldset="step_1">Copelas de suspensión</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='bearing_assembly' data-fieldset="step_1">Rodamientos</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Bomba de dirección</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Rótulas de dirección</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Vástago de dirección</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Fuelles de dirección</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Cremallera de dirección</button></div>
        <div class="col-md-4"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-service-fields='' data-fieldset="step_1">Cambio de trasmisión</button></div>
      </div>
      <div class="row js_services js_s10">
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='air_conditioned_maintenance_type' data-fieldset="step_1">Maintenimiento aire acondicionado</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Cambio de filtro habitáculo</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Cambio de compresor</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Cambio de condensador</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Cambio evaporador</button></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Cambio de termostato</button></div>
      </div>
      <div class="row js_services js_s11">
        <div class="col-md-3"></div>
        <div class="col-md-6"><button class="btn btn-2 btn-sep icon-car js_servicename" data-car-fields='brand,model,year' data-car-details-fields='true' data-service-fields='' data-fieldset="step_1">Otros servicios</button></div>
        <div class="col-md-3"></div>
      </div>
    </fieldset>
    <fieldset id="step_2">
      <h1 class="fs-title">Que coche tienes?</h1>
      <span id="js_dynamic_form"></span>
      <div class="row car-details-row">
        <div class="col-lg-12 no-lg-right-gutter">
          <textarea id="comments" name="comments" class="extra_info_textarea js_char_countable" placeholder="Quieres contarnos algo más?" maxlength="255"></textarea>
          <span class="textarea_filling_feedback">
            <span id="comments_filled_chars">0</span>/255
          </span>
        </div>
      </div>
      <div class="row car-details-row js_feedback_panel">
        <div class="col-lg-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-body text-left js_form_error_list">
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-0"></div>
        <div class="col-lg-3 col-xs-6">
          <input type="button" class="previous animation-button js_undo_problem_breadcrumb js_undo_car_breadcrumb" data-current-fieldset="step_2" value="Atrás">
        </div>
        <div class="col-lg-3 col-xs-6">
        <input type="button" class="next go_next animation-button js_car_breadcrumb js_vin_numer_search_fallback" data-fieldset="step_2" value="Continuar">
        </div>
        <div class="col-lg-3 col-xs-0"></div>
      </div>
    </fieldset>
    <fieldset id="step_3">
      <h1 class="fs-title">Tu mecanico, YA!</h1>
      <span id="js_dynamic_form_third_step"></span>
      <div class="row car-details-row">
        <div class="col-lg-6 bottom-gutter">
          <label class="orange-label">
          <span class="label-text-align">Quiero recibir la newsletter</span>
            <div class="checkbox_and_radio_container pull-right">
              <ul class="custom_checkbox">
                <li>
                  <label for="wants_newsletter">
                    <input type="checkbox" value="" id="wants_newsletter" name="wants_newsletter">
                    <span class="checkboxify icon"><i class="fa fa-check"></i></span>
                  </label>
                </li>
              </ul>
            </div>
          </label>
        </div>
        <div class="col-lg-6 bottom-gutter">
          <label class="orange-label js_hide_tooltip" data-parent-id="accepts_privacy">
          <span class="label-text-align">Acepto las condiciones</span>
            <div class="checkbox_and_radio_container pull-right">
              <ul class="custom_checkbox">
                <li>
                  <label for="accepts_privacy">
                    <input type="checkbox" value="Si" id="accepts_privacy" name="accepts_privacy" data-validation-type="mandatory_check" />
                    <span class="checkboxify icon"><i class="fa fa-check"></i></span>
                  </label>
                </li>
              </ul>
            </div>
          </label>
          <span id="accepts_privacy_tooltip" class="tooltips normal_size">La aceptación es obligatoria</span>
        </div>
      </div>
      <div class="row car-details-row js_feedback_panel">
        <div class="col-lg-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-body text-left js_form_error_list">
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-0"></div>
        <div class="col-lg-3 col-xs-6">
          <input type="button" class="previous animation-button js_undo_car_breadcrumb" data-current-fieldset="step_3" value="Atrás">
        </div>
        <div class="col-lg-3 col-xs-6">
        <input type="button" class="go_next animation-button js_saver" id="submit_button" data-fieldset="step_3" data-next-fieldset="step_4" value="Enviar" />
        </div>
        <div class="col-lg-3 col-xs-0"></div>
      </div>
    </fieldset>
    <fieldset id="step_4">
      <div id="submit_result" class="js_submit_result_container"></div>
    </fieldset>
  </form>
  <?php include 'partials/shared/_footer.php'; ?>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/javascripts/jquery.easing.min.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123breadcrumbs.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123onboarding_form_submit.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123vin_number.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123car_selector.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123cars.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123Onboarding.js" type="text/javascript"></script>
</div>
<div class="limit-wrapper">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
