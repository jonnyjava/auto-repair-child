(function(){
  var app = angular.module('garages', [ ]); app.js

  app.controller('GaragesController', function(){
    this.mechanics = garages;
  });

  var garages = [
    {
      "id": 13,
      "name": "Garage Spain 0",
      "latitude": "39.455277",
      "longitude": "-0.358695",
      "street": "Spain road",
      "zip": "46000",
      "province": "Valencia",
      "city": "Valencia",
      "email": "fake_ 0_Spain@email.com",
      "phone": "666 666 666",
      "mobile": null,
      "fax": null,
      "website": null,
      "logo": "/assets/avatar_default.jpg",
      "tyre_fees": [
      ],
      "timetable": {

      }
    },
    {
      "id": 15,
      "name": "Garage Spain 2",
      "latitude": "39.455277",
      "longitude": "-0.358695",
      "street": "Spain road",
      "zip": "46002",
      "province": "Valencia",
      "city": "Valencia",
      "email": "fake_ 2_Spain@email.com",
      "phone": "666 666 666",
      "mobile": null,
      "fax": null,
      "website": null,
      "logo": "/assets/avatar_default.jpg",
      "tyre_fees": [
      ],
      "timetable": {

      }
    }
  ]
})();

//curl -H "Authorization: Token token=6941dbbd72663f8e26ae990c56bf980f" http://0.0.0.0:3000/api/v1/garages.json
