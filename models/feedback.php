<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

Class Feedback{

  function __construct(){
    global $wpdb;
    $this->db = $wpdb;
    $reason = "";
    $comments = "";
    $token = "";
  }

  function save_feedback(){
    $table_name = $this->db->prefix . "bouncing_feedback";
    $this->db->insert( $table_name, array(
      'reason' => $this->reason,
      'comments' => $this->comments,
      'token' => $this->token)
    );
  }
}
?>