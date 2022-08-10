<?php
/*
Plugin Name:  UBS PLUGIN TEMPLATE
Description:  Enterprise WP plugin built for new Unbridled Solutions plugins
Version:      1.0.0
Author:       Sherilyn Villareal, Annie Osenbaugh, Mary Ludwig and Jessi Prinner
License:      GPL3
License URI:  https://www.gnu.org/licenses/gpl-3.0.html
Text Domain:  ubs-PLUGIN-TEMPLATE
*/
//enqueue scripts
function ubs_PLUGIN_TEMPLATE_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_register_script( 'ubs-PLUGIN-TEMPLATE-js', plugin_dir_url( __FILE__ ) . '/js/ubs-PLUGIN-TEMPLATE.js', array('jquery'),'',true );
	wp_enqueue_script( 'ubs-PLUGIN-TEMPLATE-js' ); 
	
	//load stylesheets
	wp_register_style( 'ubs-PLUGIN-TEMPLATE-style', plugin_dir_url( __FILE__ ) . 'css/style.css'  );
	wp_enqueue_style( 'ubs-PLUGIN-TEMPLATE-style' );
	
}
add_action( 'wp_enqueue_scripts', 'ubs_PLUGIN_TEMPLATE_scripts' );
//Load other Directories
global $PLUGIN_TEMPLATE_dir;
$PLUGIN_TEMPLATE_dir = plugin_dir_path( __FILE__ );
include_once( $PLUGIN_TEMPLATE_dir . 'classes/load.php');
include_once( $PLUGIN_TEMPLATE_dir . 'views/load.php');
include_once( $PLUGIN_TEMPLATE_dir . 'shortcodes/load.php');
include_once( $PLUGIN_TEMPLATE_dir . 'functions/load.php');

