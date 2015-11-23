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
        input: 'custom_input js_labelized',
        hint: 'Typeahead-hint',
        selectable: 'Typeahead-selectable'
    }
  }, {
    name: 'spanish_cities',
    source: substringMatcher(spanish_cities)
  });
});
