<?php
/*
 Plugin Name: Perfecto
 Plugin URI:
 Description: Wordpress module that allows to hover and move image on top of a page. It's good for comparing design and current HTML/CSS
 Version: 0.1
 Author: Hannes Kirsman
 Author URI:
 License: GPL
 */

function perfecto_init() {
	// todo load_plugin_textdomain(); http://codex.wordpress.org/Plugin_API/Action_Reference/init
}

add_action('init', 'perfecto_init');

/**
 * Load JavaScript and CSS
 */
function perfecto_wp_enqueue_scripts() {
	wp_enqueue_script('jquery.cookie', plugins_url('/js/jquery.cookie.js', __FILE__));
	
	wp_enqueue_script('perfecto', plugins_url('/js/perfecto.js', __FILE__), array('jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-draggable', 'jquery-ui-slider'));

	// add siteurl variable to global scope for javascript
	wp_localize_script('perfecto', 'WPULRS', array('siteurl' => get_option('siteurl')));

	wp_register_style('perfecto', plugins_url('images/perfecto.css', __FILE__));
	wp_enqueue_style('perfecto');
}

add_action('wp_enqueue_scripts', 'perfecto_wp_enqueue_scripts');
