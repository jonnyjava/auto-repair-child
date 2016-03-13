<?php

function raw_homemade_sanitize($input) {
  $input = htmlspecialchars($input, ENT_IGNORE, 'utf-8');
  $input = strip_tags($input);
  $input = stripslashes($input);
  $input = raw_dirty_replace($input);
  $input = trim($input);
  return $input;
}

function raw_dirty_replace($input){
  $suspicious_to_replace = array("DROP", "TABLE", "DATABASE", "ALTER", "CREATE", "SELECT", "UNION", "TRUNCATE", "DELETE", "JOIN", "FROM", "drop", "table", "database", "alter", "create", "select", "union", "truncate", "delete", "join", "from");
  $input = str_replace($suspicious_to_replace, "", $input);
  $chars_to_replace = array(":", ";", ")", "(", "'", "-");
  $input = str_replace($chars_to_replace, "", $input);
  return $input;
}

?>