$(document).ready(function(){
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
  var spanish_cities = ['A coru\xF1a','Alava','Albacete','Alicante','Almeria','Asturias','Avila','Badajoz','Baleares','Barcelona','Burgos','Caceres','Cadiz','Cantabria','Castellon','Ceuta','Ciudad real','Cordoba','Cuenca','Girona','Granada','Guadalajara','Guipuzcoa','Huelva','Huesca','Jaen','La rioja','Las palmas','Leon','Lleida','Lugo','Madrid','Malaga','Melilla','Murcia','Navarra','Ourense','Palencia','Pontevedra','Salamanca','Tenerife','Segovia','Sevilla','Soria','Tarragona','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];

  $('#city').typeahead({
    hint: true,
    highlight: true,
    minLength: 1,
    classNames: {
        input: '',
        hint: 'Typeahead-hint',
        selectable: 'Typeahead-selectable'
    }
  }, {
    name: 'spanish_cities',
    source: substringMatcher(spanish_cities)
  });

  $('#city').bind('keypress', disable_service_dropdown);
  $('#city').bind('typeahead:select', enable_service_dropdown);
});

function disable_service_dropdown(){
  $('.js_dropdown_opener').unbind('click', dropdown_toggler);
  $('#service_type_dropdown').parent().addClass('disabled-element');
  $('#service_type_disabled_label').addClass('disabled-element');
  $('#service_type_disabled_hint').show();
  $('.js_services').fadeOut(300);
  $('#service_type_dropdown').hide();
}

function enable_service_dropdown(){
  $('#service_type_dropdown').parent().removeClass('disabled-element');
  $('#service_type_disabled_label').removeClass('disabled-element');
  $('#service_type_disabled_hint').hide();
  var selected_service_category = $('#service_type').data('value');
  if(selected_service_category != ''){
    $('.'+selected_service_category).delay(300).fadeIn();
  }
  activate_dropdown_toggle();
}