<?php

function mayan_theme_preprocess_node(&$variables) {
	$node = $variables['node'];
	$view_mode = $variables['view_mode'];
	$variables['theme_hook_suggestions'][] = 'node__' . $node->type . '__' . $view_mode;
}

function mayan_theme_process_page(&$vars){
    drupal_add_js("jQuery( document ).ready(function() {  jQuery(\".active-trail .active\").html(jQuery(\".active-trail\").html() + \"<div class='header-active-link' style=' position: absolute; top: -22px;  left: 40%; text-shadow: 0 0 20px black; display: inline-block; transform: scale(2,2.5);    -webkit-transform: scale(2,2.5);    -ms-transform: scale(2,2.5);  color: #D95F09;    text-shadow:  0 1px 1px rgba(0,0,0,1);'>▼</div>\");});", $type='inline');
}