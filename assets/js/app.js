(function(){
  var app = angular.module('garages', ['ngMap']); app.js

  app.controller('GaragesController', ['$http',function($http){
      var garages = this;
      garages.mechanics = [];

      $http.get('https://stormy-cliffs-9773.herokuapp.com/api/v1/garages.json', {
        headers: {
            "Authorization": 'Token token="310b9e31ff8d0fa4ebca7ab1257ca729"'
        }
      }).success(function(response){
        garages.mechanics = response;
      });
    }]);

})();
