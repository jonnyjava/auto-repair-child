<?php
require 'concerns/sanitization.php';
require '../models/feedback.php';

$posted_values = $_POST;

$feedback = new Feedback();
$feedback->reason = raw_homemade_sanitize($posted_values['bouncing_feedback_id']);
$feedback->comments = raw_homemade_sanitize($posted_values['bouncing_feedback_comments']);
$feedback->token = raw_homemade_sanitize($posted_values['token']);
$feedback->save_feedback();

?>