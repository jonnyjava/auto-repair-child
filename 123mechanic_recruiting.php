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
<?php $recruiting_token = $_GET['token'] ?>
<div style="display:none;">
  <span id="step_2_above"><?php if ($step2_above) { echo panel_inside_row($step2_above); }  ?></span>
  <span id="step_2_below"><?php if ($step2_below) { echo panel_inside_row($step2_below); }  ?></span>
  <span id="step_3_above"><?php if ($step3_above) { echo panel_inside_row($step3_above); }  ?></span>
  <span id="step_3_below"><?php if ($step3_below) { echo panel_inside_row($step3_below); }  ?></span>
</div>

<div class="join_container js_animatable_container">
  <?php include 'partials/shared/_preloader.php'; ?>
  <?php if (isset($recruiting_token)) { ?>
    <div class="msform feedback_container js_feedback_form">
      <form id="bouncing_feedback_form" autocomplete="false" autofill="false" action="<?php echo bloginfo('stylesheet_directory');?>" data-destination="<?php echo get_field('feedback_received');?>" method="post">
        <fieldset id="no_step">
          <?php
            $not_interested = get_field('no_te_interesa');
            if ($not_interested){
              echo panel_inside_row($not_interested);
            }
          ?>
          <div class="row car-details-row">
            <div class="col-lg-4 no-lg-right-gutter">
              <label data-dropdown-name="bouncing_feedback_dropdown" class="orange-label js_dropdown_opener">Porquè no te interesa?</label>
              <span id="bouncing_feedback_tooltip" class="tooltips normal_size over_big_radiobuttons_row">Porquè no te interesa?</span>
            </div>
            <div class="col-lg-8 no-lg-left-gutter bottom-gutter">
              <div class="dropdown">
                <button type="button" class="btn dropdown-toggle js_dropdown_opener" data-dropdown-name="bouncing_feedback_dropdown">
                  <span class="dropdown-value" id="bouncing_feedback"><i class="hint">Elije una opción</i></span>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu js_dropdown_menu" data-parent-id="bouncing_feedback" id="bouncing_feedback_dropdown">
                  <li data-value="0">Me parece una estafa y no me fio</li>
                  <li data-value="1">No entiendo nada</li>
                  <li data-value="2">No quiero daros mis datos</li>
                  <li data-value="3">Ya estoy registrado en otra plataforma</li>
                  <li data-value="4">Odio internet que me roba los clientes</li>
                  <li data-value="5">Otra cosa</li>
                </ul>
                <input type="hidden" name="bouncing_feedback_name" id="bouncing_feedback_name" data-parent-id="bouncing_feedback" data-validation-type="drop_or_radio" value=""/>
                <input type="hidden" name="bouncing_feedback_id" id="bouncing_feedback_id" data-parent-id="bouncing_feedback" data-validation-type="drop_or_radio" value=""/>
              </div>
            </div>
          </div>
          <div class="row car-details-row">
            <div class="col-lg-12 no-lg-right-gutter">
              <textarea id="bouncing_feedback_comments" name="bouncing_feedback_comments" class="extra_info_textarea js_char_countable" placeholder="Quieres contarnos algo más?" maxlength="255"></textarea>
              <span class="textarea_filling_feedback">
                <span id="bouncing_feedback_comments_filled_chars">0</span>/255
              </span>
            </div>
          </div>
          <div class="row car-details-row">
            <div class="col-lg-4 col-xs-0"></div>
            <div class="col-lg-4 col-xs-12 join_button">
              <input type="button" class="next go_next animation-button js_submit_feedback" value="Enviar">
            </div>
            <div class="col-lg-4 col-xs-0"></div>
          </div>
          <input type="hidden" value="<?php echo $recruiting_token; ?>" id="recruitable_token" name="token" class="js_token"/>
        </fieldset>
      </form>
    </div>
  <?php } ?>

  <div class="msform js_recruiting_form">
    <fieldset id="step_1">
      <form id="recruitable_form" method="post" autocomplete="false" autofill="false" class="js_form js_recruiting_fields" action="<?php echo bloginfo('stylesheet_directory');?>">
        <h1 class="fs-title">¡Unete a nosotros!</h1>
        <?php if ($step1_above) { echo panel_inside_row($step1_above); }  ?>
        <div class="row car-details-row">
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="garage_name">
            <label for="garage_name" class="orange-label">Taller</label>
          </div>
          <div class="col-lg-6 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="garage_name">
            <input type="text" id="garage_name" name="garage_name" data-validation-type="not_empty" />
            <div class="help"><i>Pon el nombre completo de tu taller</i></div>
            <span id="garage_name_tooltip" class="tooltips normal_size">Como se llama tu taller?</span>
          </div>
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="recruitable_tax_id">
            <label for="recruitable_tax_id" class="orange-label">CIF/NIF</label>
          </div>
          <div class="col-lg-2 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="recruitable_tax_id">
            <input type="text" id="recruitable_tax_id" name="recruitable_tax_id" class="uppercased_content" maxlength="9" data-validation-type="tax_id" />
            <div class="help"><i>Los 9 digitos</i></div>
            <span id="recruitable_tax_id_tooltip" class="tooltips normal_size">CIF/NIF invalido</span>
          </div>
        </div>
        <div class="row car-details-row">
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="recruitable_street">
            <label for="recruitable_street" class="orange-label">Dirección</label>
          </div>
          <div class="col-lg-6 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="recruitable_street">
            <input type="text" id="recruitable_street" name="recruitable_street" class="js_autocompletable_address" data-validation-type="address" />
            <div class="help"><i>Pon la dirección completa<span class="help_for_big">, será más facil localizarte en el mapa</span></i></div>
            <span id="recruitable_street_tooltip" class="tooltips normal_size">Esta dirección no es valida</span>
          </div>
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="recruitable_zip">
            <label for="recruitable_zip" class="orange-label">Código postal</label>
          </div>
          <div class="col-lg-2 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="recruitable_zip">
            <input type="text" id="recruitable_zip" name="recruitable_zip" class="uppercased_content" maxlength="5" data-validation-type="zip" />
            <span id="recruitable_zip_tooltip" class="tooltips normal_size">CP incorrecto</span>
          </div>
        </div>
        <div class="row car-details-row">
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="recruitable_email">
            <label for="recruitable_email" class="orange-label">Email</label>
          </div>
          <div class="col-lg-6 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="recruitable_email">
            <input type="text" id="recruitable_email" name="recruitable_email" data-validation-type="email"/>
            <div class="help"><i>es: tunombre@email.com</i></div>
            <span id="recruitable_email_tooltip" class="tooltips normal_size">Email invalida!</span>
          </div>

          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="recruitable_phone">
            <label for="recruitable_phone" class="orange-label">Teléfono</label>
          </div>
          <div class="col-lg-2 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="recruitable_phone">
            <input type="text" id="recruitable_phone" name="recruitable_phone" class="uppercased_content js_phone_formatter" maxlength="12" data-validation-type="phone" />
            <div class="help"><i>Solo digitos, sin +34 ni espacios</i></div>
            <span id="recruitable_phone_tooltip" class="tooltips normal_size">Telefono invalido!</span>
          </div>
        </div>
        <div class="row car-details-row">
          <div class="col-lg-2 no-lg-right-gutter js_hide_tooltip" data-parent-id="recruitable_password">
            <label for="recruitable_password" class="orange-label">Contraseña</label>
          </div>
          <div class="col-lg-6 no-lg-left-gutter bottom-gutter js_hide_tooltip" data-parent-id="recruitable_password">
            <input type="text" class="js_password" id="recruitable_password" name="recruitable_password" maxlength="20" data-validation-type="not_empty" />
            <div class="help"><i>Nivel de seguridad:</i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_1"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_2"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_3"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_4"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_5"></i>
              <i class="fa fa-circle-thin password_strength js_password_strength" id="js_password_strength_6"></i>
            </div>
            <span id="recruitable_password_tooltip" class="tooltips normal_size">Minimo 6 caracteres</span>
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
        <div class="row js_feedback_panel">
          <div class="col-lg-12 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body text-left js_form_error_list">
                </div>
              </div>
          </div>
        </div>
        <div class="row car-details-row">
          <div class="col-lg-2 col-xs-0"></div>
          <?php if (isset($recruiting_token)) {?>
            <div class="col-lg-5 col-xs-12 join_button">
              <input type="button" id="submit_step_1" class="next go_next animation-button js_join_123mecanico js_saver" data-fieldset="step_1" data-next-fieldset="step_2" value="UNIRME!">
            </div>
            <div class="col-lg-3 col-xs-0">
              <input type="button" class="previous animation-button js_recruiting_bouncer" value="No me interesa">
            </div>
          <?php } else {?>
            <div class="col-lg-8 col-xs-12 join_button">
              <input type="button" id="submit_step_1" class="next go_next animation-button js_join_123mecanico js_saver" data-fieldset="step_1" data-next-fieldset="step_2" value="UNIRME!">
            </div>
          <?php } ?>
          <div class="col-lg-2 col-xs-0"></div>
        </div>
        <?php if (isset($recruiting_token)) { ?>
          <input type="hidden" value="<?php echo $recruiting_token; ?>" id="token" name="token" class="js_token"/>
        <?php } ?>
      </form>
    </fieldset>
    <fieldset id="step_2">
      <div id="step_2_result_container" class="js_submit_result_container"></div>
      <div id="step_2_submit_result"></div>
    </fieldset>
    <fieldset id="step_3">
      <div class="js_submit_result_container"></div>
      <div id="step_3_submit_result"></div>
    </fieldset>
  </div>

  <?php include 'partials/shared/_footer.php'; ?>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123animations_for_recruiting_pages.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123button_bar.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123events_for_recruiting_pages.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123password_checker.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123recruiting_campaign.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123registration_form_submit.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123recruiting.js" type="text/javascript"></script>
  <?php if (isset($recruiting_token)) { ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123feedback_form_submit.js" type="text/javascript"></script>
  <?php } ?>
</div>
<div class="limit-wrapper">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
