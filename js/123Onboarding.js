$('.js_saver').click(function(){
  var city = $('#city').val();
  var service_category = $('#service_type option:selected').val();
  var service_detail = $('#service_detail').val();
  var car_brand = $('#car_brand option:selected').val();
  var car_model = $('#car_model option:selected').val();
  var car_year = $('#car_year option:selected').val();
  var name_and_surname = $('#name_and_surname').val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  //var home_maintenance = $('#home_maintenance_onboarding').val();
  //var conditions_accepted = $('#conditions_accepted_onboarding').val();
  window.parent.document.getElementById('city_onboarding').value = city;
  window.parent.document.getElementById('service_category_onboarding').value = service_category;
  window.parent.document.getElementById('service_detail_onboarding').value = service_detail;
  window.parent.document.getElementById('car_brand_onboarding').value = car_brand;
  window.parent.document.getElementById('car_model_onboarding').value = car_model;
  window.parent.document.getElementById('car_year_onboarding').value = car_year;
  window.parent.document.getElementById('name_and_surname_onboarding').value = name_and_surname;
  window.parent.document.getElementById('phone_onboarding').value = phone;
  window.parent.document.getElementById('email_onboarding').value = email;
  //window.parent.document.getElementById('home_maintenance_onboarding').value = home_maintenance;
  //window.parent.document.getElementById('conditions_accepted_onboarding').value = conditions_accepted;
});

$('#service_type').change(function () {
  var animation_time = 400;
  $('.js_services').fadeOut(animation_time);
  $('.' + $(this).val()).delay(animation_time).fadeIn();
});

var current_fs, next_fs, previous_fs;
var left, opacity, scale;
var animating;
$('.next').click(function (event) {
  event.preventDefault();
  if (animating)
      return false;
  animating = true;
  fs_id = $(this).data('fieldset');
  current_fs = $('#' + fs_id);
  next_fs = $('#' + fs_id).next();
  $('#progressbar li').eq($('fieldset').index(next_fs)).addClass('active');
  next_fs.show();
  current_fs.animate({ opacity: 0 }, {
      step: function (now, mx) {
          scale = 1 - (1 - now) * 0.2;
          left = now * 50 + '%';
          opacity = 1 - now;
          current_fs.css({ 'transform': 'scale(' + scale + ')' });
          next_fs.css({
              'left': left,
              'opacity': opacity
          });
      },
      duration: 800,
      complete: function () {
          current_fs.hide();
          animating = false;
      },
      easing: 'easeInOutBack'
  });
});
$('.previous').click(function () {
  if (animating)
      return false;
  animating = true;
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  $('#progressbar li').eq($('fieldset').index(current_fs)).removeClass('active');
  previous_fs.show();
  current_fs.animate({ opacity: 0 }, {
      step: function (now, mx) {
          scale = 0.8 + (1 - now) * 0.2;
          left = (1 - now) * 50 + '%';
          opacity = 1 - now;
          current_fs.css({ 'left': left });
          previous_fs.css({
              'transform': 'scale(' + scale + ')',
              'opacity': opacity
          });
      },
      duration: 800,
      complete: function () {
          current_fs.hide();
          animating = false;
      },
      easing: 'easeInOutBack'
  });
});
$('.submit').click(function () {
  return false;
});
var substringMatcher = function (strs) {
  return function findMatches(q, cb) {
      var matches, substringRegex;
      matches = [];
      substrRegex = new RegExp(q, 'i');
      $.each(strs, function (i, str) {
          if (substrRegex.test(str)) {
              matches.push(str);
          }
      });
      cb(matches);
  };
};
var spanish_cities = [
  'A coru\xF1a',
  'Alava',
  'Albacete',
  'Alicante',
  'Almeria',
  'Asturias',
  'Avila',
  'Badajoz',
  'Baleares',
  'Barcelona',
  'Burgos',
  'Caceres',
  'Cadiz',
  'Cantabria',
  'Castellon',
  'Ceuta',
  'Ciudad real',
  'Cordoba',
  'Cuenca',
  'Girona',
  'Granada',
  'Guadalajara',
  'Guipuzcoa',
  'Huelva',
  'Huesca',
  'Jaen',
  'La rioja',
  'Las palmas',
  'Leon',
  'Lleida',
  'Lugo',
  'Madrid',
  'Malaga',
  'Melilla',
  'Murcia',
  'Navarra',
  'Ourense',
  'Palencia',
  'Pontevedra',
  'Salamanca',
  'Tenerife',
  'Segovia',
  'Sevilla',
  'Soria',
  'Tarragona',
  'Teruel',
  'Toledo',
  'Valencia',
  'Valladolid',
  'Vizcaya',
  'Zamora',
  'Zaragoza'
];
$('#city').typeahead({
  hint: true,
  highlight: true,
  minLength: 1,
  classNames: {
      input: 'custom_input',
      hint: 'Typeahead-hint',
      selectable: 'Typeahead-selectable'
  }
}, {
  name: 'spanish_cities',
  source: substringMatcher(spanish_cities)
});
