<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/* Add custom functions below */

add_action('wp_head', 'show_template'); 

function show_template() { 	
global $template;
print_r('<!--'.$template.'-->');
}