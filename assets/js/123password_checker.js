function password_strength_checker(password){
  var password_strength = check_strength(password);
  fill_strength_indicator(password_strength);
}

function check_strength(password){
  var password_strength = 0;
  var minPasswordLength = 8;
  var goodPasswordLength = 12;
  var _hasLowerCase = /[a-z]/;
  var _hasUpperCase = /[A-Z]/;
  var _hasDigit = /\d/;
  var _hasSpecial = /(_|[^\w\d ])/;

  if (password.length >= minPasswordLength){ password_strength ++; }
  if (password.length >= goodPasswordLength){ password_strength ++; }
  if ( _hasLowerCase.test(password) && _hasUpperCase.test(password)  ) { password_strength+=2; }
  if ( _hasDigit.test(password) ) { password_strength++; }
  if ( _hasSpecial.test(password) ) { password_strength++; }

  return password_strength;
}

function fill_strength_indicator(password_strength){
  $('.js_password_strength').removeClass('fa-circle');
  $('.js_password_strength').addClass('fa-circle-thin');
  for(var i = 0; i<=password_strength; i++){
    $('#js_password_strength_'+i).removeClass('fa-circle-thin');
    $('#js_password_strength_'+i).addClass('fa-circle');
  }
}
