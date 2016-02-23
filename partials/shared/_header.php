<?php
require_once(dirname(__FILE__).'/../../private/constants.php');
require_once(dirname(__FILE__).'/../../vendor/rollbar.php');
$constants = get_costants();

if ($constants['environment'] != 'development'){
  Rollbar::init(array('access_token' => $constants['rollbar_server_token'],'environment' => $constants['environment']));
?>
  <script>
  var _rollbarConfig = {
    accessToken: "<?php echo $constants['rollbar_client_token']?>",
    captureUncaught: true,
    ignoreAjaxErrors: false,
    payload: {
      environment: "<?php echo $constants['environment']?>"
    }
  };
  </script>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/javascripts/rollbar.min.js" type="text/javascript"></script>
<?php } //end Rollbar inclusion ?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="google" value="notranslate">
<meta content='width=device-width, initial-scale=1' name='viewport'>
<link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Nunito:400,300,700|Palanquin+Dark:400,500,600,700">
<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/bootstrap-3.3.5/css/bootstrap.min.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123Onboarding.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123buttons.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123checkbox.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123preloader.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123progressform.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123tooltips.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123OnboardingSmallMQ.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123OnboardingMediumMQ.css">
<link rel="stylesheet prefetch" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/123OnboardingLargeMQ.css">
