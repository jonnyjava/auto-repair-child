<?php /* Template Name: quote_proposal */ ?>
<?php get_header(); ?>
</div>
<?php
  include 'partials/shared/_header.php';
  $quote_token = $_GET['token'];
?>
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123quote_proposal.css">

<div class="quote_container js_animatable_container">
  <div class="msform quote_container">
    <?php include 'partials/shared/_preloader.php'; ?>
    <form id="quote_form" method="post" autocomplete="false" autofill="false" class="" action="<?php echo bloginfo('stylesheet_directory');?>">
    <?php
      if(isset($quote_token)){
    ?>
      <fieldset id="step_1">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="fs-title">¡Tu presupuesto!</h1>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row text-left">
              <div class="col-lg-1"></div>
              <div class="col-lg-10">
                <?php echo get_field('your_quote_up'); ?>
              </div>
              <div class="col-lg-1"></div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row text-left">
              <div class="col-lg-12">
                <span class="round_number orange">
                  <span>1</span>
                </span>
                <h4 class="quote_section_title">Tu solicitud</h4>
              </div>
            </div>
            <div class="row text-left">
              <div class="col-lg-1"></div>
              <div class="col-lg-5">
                <ul class="list-unstyled list-info">
                  <li>
                    <span class="list-icon fa fa-map-marker"></span>
                    <label>Ciudad</label>
                    <span id="city"></span>
                  </li>
                  <li>
                    <span class="list-icon fa fa-user"></span>
                    <label>Nombre</label>
                    <span id="name_and_surname"></span>
                  </li>
                  <li>
                    <span class="list-icon fa fa-phone"></span>
                    <label>Teléfono</label>
                    <span id="phone"></span>
                  </li>
                  <li>
                    <span class="list-icon fa fa-envelope"></span>
                    <label>Email</label>
                    <span id="email"></span>
                  </li>
                </ul>
              </div>
              <div class="col-lg-5">
                <ul class="list-unstyled list-info">
                  <li>
                    <span class="list-icon fa fa-list"></span>
                    <label>Servicio</label>
                    <span id="service"></span>
                  </li>
                  <li>
                    <span class="list-icon fa fa-car"></span>
                    <label>Vehículo</label>
                    <span id="car"></span>
                  </li>
                  <li>
                    <span class="list-icon fa fa-barcode"></span>
                    <label>Numero de bastidor</label>
                    <span id="vin_number"></span>
                  </li>
                </ul>
              </div>
              <div class="col-lg-1"></div>
            </div>
            <div class="row text-left">
              <div class="col-lg-1"></div>
              <div class="col-lg-10">
                <ul class="list-unstyled list-info">
                  <li id="user_comments"></li>
                </ul>
              </div>
              <div class="col-lg-1"></div>
            </div>
            <div class="row text-left">
              <div class="col-lg-12">
                <span class="round_number orange">
                  <span>2</span>
                </span>
                <h4 class="quote_section_title">Tu presupuesto</h4>
              </div>
            </div>
            <div class="row text-left">
              <div class="col-lg-1"></div>
              <div class="col-lg-10">
                <ul class="list-unstyled list-info">
                  <li>
                    <span id="proposal"></span>
                  </li>
                  <li>
                    <span class="list-icon fa fa-file"></span>
                    <label>Documentos ajuntos</label>
                    <a id="doc1_file_url" href="" target="_blank" class="hidden file-button"><i class="fa fa-file"></i>&nbsp;<span id="doc1_file_name"></span></a>
                    <a id="doc2_file_url" href="" target="_blank" class="hidden file-button"><i class="fa fa-file"></i>&nbsp;<span id="doc2_file_name"></span></a>
                    <a id="doc3_file_url" href="" target="_blank" class="hidden file-button"><i class="fa fa-file"></i>&nbsp;<span id="doc3_file_name"></span></a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-1"></div>
            </div>
            <div class="row text-left">
              <div class="col-lg-1"></div>
              <div class="col-lg-5">
                <ul class="list-unstyled list-info">
                  <li>
                    <span class="list-icon fa fa-eur"></span>
                    <label>Precio</label><span id="price"></span>
                  </li>
                </ul>
              </div>
              <div class="col-lg-5">
                <ul class="list-unstyled list-info">
                  <li>
                    <span class="list-icon fa fa-calendar"></span>
                    <label>Validez</label><span id="expiration"></span>
                  </li>
                </ul>
              </div>
              <div class="col-lg-1"></div>
            </div>
            <div class="row text-left">
              <div class="col-lg-12">
                <span class="round_number orange">
                  <span>3</span>
                </span>
                <h4 class="quote_section_title">Tu mecanico, ya!</h4>
              </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row text-left">
              <div class="col-lg-1"></div>
              <div class="col-lg-10">
                <?php echo get_field('your_quote_bottom'); ?>
              </div>
              <div class="col-lg-1"></div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
              <div class="col-lg-1"></div>
              <div class="col-lg-6 col-xs-7">
                <button type="button" class="next go_next animation-button js_saver js_quote_answer" data-title="TU MECANICO, YA!" data-fieldset="step_1" data-next-fieldset="step_2" value="accepted">Estoy interesado</button>
              </div>
              <div class="col-lg-4 col-xs-5">
                <button type="button" class="previous animation-button js_saver js_quote_answer" data-title="GRACIAS POR TU FEEDBACK" data-fieldset="step_1" data-next-fieldset="step_2" value="refused">No gracias</button>
              </div>
              <div class="col-lg-1"></div>
            </div>
          </div>
          <div class="row">&nbsp;</div>
        </div>
      </fieldset>
      <fieldset id="step_2">
        <div id="submit_result" class="js_submit_result_container">
          <div class="row ">
            <div class="col-lg-12 text-center">
              <h1 class="fs-title js_quote_answer_page_title"><h1>
            </div>
          </div>
          <div class="js_refused_landing">
            <div class="panel panel-default">
              <div class="panel-body text-left">
                <div class="row text-left">
                  <div class="col-lg-12">
                    <?php echo get_field('quote_refused_up'); ?>
                  </div>
                </div>
                <div class="row text-left">
                  <div class="col-lg-12">
                    <?php echo get_field('quote_refused_bottom'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-left js_garage_data_landing">
              <div class="panel panel-default">
                <div class="panel-body text-left">
                  <div class="row">
                    <div class="col-lg-12">
                      <?php echo get_field('quote_accepted_up'); ?>
                    </div>
                  </div>
                  <div class="row">&nbsp;</div>
                  <div class="row">
                    <div class="col-lg-6">
                      <img alt="" class="js_garage_map">
                    </div>
                    <div class="col-lg-6">
                      <ul class="list-unstyled list-info">
                        <li id="garage_name_line">
                          <span class="list-icon fa fa-car"></span>
                          <label>Garage</label>
                          <span id="garage_name"></span>
                        </li>
                        <li id="garage_street_line">
                          <span class="list-icon fa fa-map-marker"></span>
                          <label>Dirección</label>
                          <span id="garage_street"></span>
                          <span id="garage_zip"></span>
                        </li>
                        <li id="garage_email_line">
                          <span class="list-icon fa fa-envelope"></span>
                          <label>Email</label>
                          <span id="garage_email"></span>
                        </li>
                        <li id="garage_phone_line">
                          <span class="list-icon fa fa-phone"></span>
                          <label>Teléfono</label>
                          <span id="garage_phone"></span>
                        </li>
                        <li id="garage_mobile_line">
                          <span class="list-icon fa fa-mobile"></span>
                          <label>Movíl</label>
                          <span id="garage_mobile"></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="row">&nbsp;</div>
                  <div class="row">
                    <div class="col-lg-12">
                      <?php echo get_field('quote_accepted_bottom'); ?>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </fieldset>
      <input type="hidden" value="<?php echo $quote_token; ?>" id="quote_token" name="quote_token" class="js_token"/>
    <?php
      }
      else{
        include 'partials/_error_page.html';
      }
    ?>
    </form>
  </div>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/javascripts/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123animations.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123events.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123row_ajax_builder.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123setup.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/123utils.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/quote_proposals/123quote_page_builder.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/quote_proposals/123quote_submit.js" type="text/javascript"></script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/quote_proposals/123quote_proposal.js" type="text/javascript"></script>
</div>

<div class="limit-wrapper">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
