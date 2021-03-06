<?php /* Template Name: garages-map */ ?>
<?php get_header(); ?>
<div ng-app="garages">
  <div ng-controller="GaragesController as garages">
    <div class="row">

      <map center="{{garages.mechanics[0].latitude}}, {{garages.mechanics[0].longitude}}" zoom="12">
        <div ng-repeat="mechanic in garages.mechanics">
          <marker position="{{mechanic.latitude}},{{mechanic.longitude}}" title="{{mechanic.name}}"  on-click="showInfoWindow(event, 'bar')">
          </marker>
          <info-window id="bar" visible-on-marker="foo">
            <div ng-non-bindable="">
            <div id="siteNotice"></div>
              <h1 id="firstHeading" class="firstHeading">{{mechanic.name}}</h1>
              <div id="bodyContent">
                {{mechanic.name}}
              </div>
            </div>
          </info-window>
        </div>
      </map>

    </div>
    <table class="table table-striped table-bordered table-responsive">
      <tr>
        <th>Name</th>
        <th>Street</th>
        <th>Zip</th>
        <th>Province</th>
        <th>City</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Logo</th>
      </tr>
      <tr ng-repeat="mechanic in garages.mechanics">
        <td>{{mechanic.name}}</td>
        <td>{{mechanic.street}}</td>
        <td>{{mechanic.zip}}</td>
        <td>{{mechanic.province}}</td>
        <td>{{mechanic.city}}</td>
        <td>{{mechanic.email}}</td>
        <td>{{mechanic.phone}}</td>
        <td><img ng-src="{{mechanic.logo}}" class="img-responsive" alt="{{mechanic.name}}" title="{{mechanic.name}}"/></td>
      </tr>
    </table>
    <script language="javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&v=3"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/javascripts/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/javascripts/ng-map.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/app.js"></script>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/bootstrap-3.3.5/css/bootstrap.min.css">
  </div>
</div>

<?php get_footer(); ?>
