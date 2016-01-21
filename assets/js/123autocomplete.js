function activate_city_autocomplete(){
  $('#user_city').bind('keypress', disable_service_dropdown);
  $('#user_city').bind('typeahead:select', enable_service_dropdown);
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

  $('.js_user_city_autocomplete').typeahead({
    hint: true,
    highlight: true,
    minLength: 3,
    classNames: {
        input: '',
        hint: 'Typeahead-hint',
        selectable: 'Typeahead-selectable'
    }
  }, {
    name: 'spanish_cities',
    source: substringMatcher(spanish_cities)
  });
}
