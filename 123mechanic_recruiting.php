<?php /* Template Name: mechanic_recruiting */ ?>
<?php get_header(); ?>
</div>
<?php
  include 'partials/shared/_header.php';
  require_once('helpers/html_helpers.php');
?>
<?php $step1_above = get_field('mechanic_recruiting_c2a_step1_above'); ?>
<?php $step1_below = get_field('mechanic_recruiting_c2a_step1_below'); ?>
<?php $step2_above = get_field('mechanic_recruiting_c2a_step2_above'); ?>
<?php $step2_below = get_field('mechanic_recruiting_c2a_step2_below'); ?>
<?php $step3_above = get_field('mechanic_recruiting_c2a_step3_above'); ?>
<?php $step3_below = get_field('mechanic_recruiting_c2a_step3_below'); ?>
<div style="display:none;">
  <span id="step_2_above"><?php if ($step2_above) { echo panel_inside_row($step2_above); }  ?></span>
  <span id="step_2_below"><?php if ($step2_below) { echo panel_inside_row($step2_below); }  ?></span>
  <span id="step_3_above"><?php if ($step3_above) { echo panel_inside_row($step3_above); }  ?></span>
  <span id="step_3_below"><?php if ($step3_below) { echo panel_inside_row($step3_below); }  ?></span>
</div>
<div class="join_container js_animatable_container">
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

  <div class="msform">
    <fieldset id="step_1">
      <form id="join_form" action="<?php echo bloginfo('stylesheet_directory');?>" method="post">
        <h1 class="fs-title">¡Unete a nosotros!</h1>
        <?php if ($step1_above) { echo panel_inside_row($step1_above); }  ?>
        <div class="row car-details-row">
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="garage_name">
            <label for="garage_name" class="orange-label">Taller</label>
          </div>
          <div class="col-lg-6 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="garage_name">
            <input type="text" id="garage_name" name="garage_name" class="uppercased_content" data-validation-type="not_empty" />
            <div class="help"><i>Pon el nombre completo de tu taller</i></div>
            <span id="garage_name_tooltip" class="tooltips normal_size">Como se llama tu taller?</span>
          </div>
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="tax_id">
            <label for="tax_id" class="orange-label">CIF/NIF</label>
          </div>
          <div class="col-lg-2 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="tax_id">
            <input type="text" id="tax_id" name="tax_id" class="uppercased_content" maxlength="9" data-validation-type="tax_id" />
            <div class="help"><i>Los 9 digitos</i></div>
            <span id="tax_id_tooltip" class="tooltips normal_size">Código invalido</span>
          </div>
        </div>
        <div class="row car-details-row">
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="street">
            <label for="street" class="orange-label">Dirección</label>
          </div>
          <div class="col-lg-6 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="street">
            <input type="text" id="street" name="street" class="uppercased_content js_autocompletable_address" data-validation-type="address" />
            <div class="help"><i>Pon la dirección completa<span class="help_for_big">, será más facil localizarte en el mapa</span></i></div>
            <span id="street_tooltip" class="tooltips normal_size">Esta dirección no es valida</span>
          </div>
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="zip">
            <label for="zip" class="orange-label">Código postal</label>
          </div>
          <div class="col-lg-2 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="zip">
            <input type="text" id="zip" name="zip" class="uppercased_content" maxlength="5" data-validation-type="zip" />
            <span id="zip_tooltip" class="tooltips normal_size">CP incorrecto</span>
          </div>
        </div>
        <div class="row car-details-row">
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="email">
            <label for="email" class="orange-label">Email</label>
          </div>
          <div class="col-lg-6 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="email">
            <input type="text" id="email" name="email" class="uppercased_content" data-validation-type="email"/>
            <div class="help"><i>es: tunombre@email.com</i></div>
            <span id="email_tooltip" class="tooltips normal_size">Email invalida!</span>
          </div>

          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="phone">
            <label for="phone" class="orange-label">Teléfono</label>
          </div>
          <div class="col-lg-2 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="phone">
            <input type="text" id="phone" name="phone" class="uppercased_content js_phone_formatter" maxlength="12" data-validation-type="phone" />
            <div class="help"><i>Solo digitos, sin +34</i></div>
            <span id="phone_tooltip" class="tooltips normal_size">Numero invalido!</span>
          </div>
        </div>
        <div class="row car-details-row">
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="password">
            <label for="password" class="orange-label">Contraseña</label>
          </div>
          <div class="col-lg-6 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="password">
            <input type="password" class="js_password" id="password" name="password" maxlength="20" data-validation-type="not_empty" />
            <div class="help"><i>Nivel de seguridad:</i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_1"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_2"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_3"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_4"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_5"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_6"></i>
            </div>
            <span id="password_tooltip" class="tooltips normal_size">Minimo 6 caracteres</span>
          </div>
          <div class="col-lg-4 col-xs-12 js_hide_tooltip" data-parent-id="accepts_privacy">
            <label class="orange-label">
              <span class="label-text-align">Acepto las condiciones de uso.</span>
              <div class="checkbox_and_radio_container pull-right">
                <ul class="custom_checkbox">
                  <li>
                    <input type="checkbox" value="Si" id="accepts_privacy" name="accepts_privacy" data-validation-type="mandatory_check" />
                    <span class="checkboxify icon"><i class="fa fa-check"></i></span>
                  </li>
                </ul>
              </div>
            </label>
            <div class="help">
              <a href="<?php echo bloginfo('wpurl');?>/service-agreement/" target="blank" class="help_link">
                <i>Terminos Y condiciones del servicio.</i>
              </a>
            </div>
            <span id="accepts_privacy_tooltip" class="tooltips normal_size">La aceptación es obligatoria</span>
          </div>
        </div>
        <?php if ($step1_below) { echo panel_inside_row($step1_below); }  ?>
        <div class="row car-details-row">
          <div class="col-lg-4 col-xs-0"></div>
          <div class="col-lg-4 col-xs-12 join_button">
          <input type="button" id="submit_step_1" class="next go_next animation-button js_join_123mecanico" data-fieldset="step_1" value="ENVIAR!">
          </div>
          <div class="col-lg-4 col-xs-0"></div>
        </div>
      </form>
    </fieldset>
    <fieldset id="step_2">
      <div id="step_2_submit_result"></div>
    </fieldset>
    <fieldset id="step_3">
      <div id="step_3_submit_result"></div>
    </fieldset>
  </div>
  <?php include 'partials/shared/_footer.php'; ?>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123button_bar.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123registration_form_submit.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123password_checker.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123join.js" type="text/javascript"></script>
</div>
<div class="limit-wrapper">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
