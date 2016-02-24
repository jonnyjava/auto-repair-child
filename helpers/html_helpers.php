<?php
function panel_inside_row($content){
  $panel = "<div class='row car-details-row text-left'>";
  $panel .= "<div class='col-lg-12 recruiting_confirmation_page'>";
  $panel .= "<div class='panel panel-default'>";
  $panel .= "<div class='panel-body'>";
  $panel .= $content;
  $panel .= "</div>";
  $panel .= "</div>";
  $panel .= "</div>";
  $panel .= "</div>";
  return $panel;
}
?>
