$(document).ready(function(){
  activate_city_autocomplete();
  $('#user_city').bind('keypress', disable_service_dropdown);
  $('#user_city').bind('typeahead:select', enable_service_dropdown);
});

function activate_city_autocomplete(){
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

function disable_service_dropdown(){
  $('.js_dropdown_opener').unbind('click', dropdown_toggler);
  $('#service_category_dropdown').parent().addClass('disabled-element');
  $('#service_category_disabled_label').addClass('disabled-element');
  $('#service_category_disabled_hint').show();
  $('.js_services').fadeOut(300);
  $('#service_category_dropdown').hide();
}

function enable_service_dropdown(){
  $('#service_category_dropdown').parent().removeClass('disabled-element');
  $('#service_category_disabled_label').removeClass('disabled-element');
  $('#service_category_disabled_hint').hide();
  var selected_service_category = $('#service_category').data('value');
  if(selected_service_category != ''){
    $('.'+selected_service_category).delay(300).fadeIn();
  }
  activate_dropdown_toggle();
}
