<?php
/*
Plugin Name: Tutor LMS Elementor Add-ons
Plugin URI: https://www.radiustheme.com
Description: Elementor addons for tutor lms plugin
Version: 1.0.0
Author: RadiusTheme
Text Domain: tutor
Author URI: https://www.radiustheme.com
*/

define( 'TUTOR_BASE_DIR',    plugin_dir_path( __FILE__ ) );
define( 'TUTOR_TAXONOMY',    'course-category' );

if ( ! class_exists('Tutor_Elementor_addon') ) {
	include_once 'elementor/init.php';
}

if ( ! class_exists('Customizer_control') ) {
	include_once 'customizer/init.php';
}

add_action( 'wp_enqueue_scripts', 'tutor_enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'tutor_enqueue_scripts' );
add_action( 'init', 'ajax_script_enqueuer');
  
function tutor_enqueue_scripts(){
	wp_enqueue_style( 'tutor-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/tutor-elementor.css' );
	wp_enqueue_style( 'tutor-animate-css', plugin_dir_url( __FILE__ ) . 'dependencies/animate/animate.min.css' );
	wp_enqueue_style( 'swiper-bundle-css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
	wp_enqueue_script( 'isotope-library', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', null, null, false );
	wp_enqueue_script( 'masonry-library', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', null, null, false );
	wp_enqueue_script( 'swiper-bundle-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', null, null, false );
	wp_enqueue_script( 'tutor-elementor-core-js', plugin_dir_url( __FILE__ ) . 'assets/js/tutor-lementor-addons-core.js', array( 'jquery' ), true );
	wp_enqueue_script( 'tutor-common-js', plugin_dir_url( __FILE__ ) . 'assets/js/tutor-common.js', '', '', true );
	wp_enqueue_script( 'tutor-wow-js', plugin_dir_url( __FILE__ ) . 'dependencies/wow/js/wow.min.js', '', true );
}

function ajax_script_enqueuer() {
	wp_register_script( "ajax_script", plugin_dir_url( __FILE__ ).'assets/js/ajax-filter.js', array('jquery') );
	wp_localize_script( 'ajax_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
 
	wp_enqueue_script( 'ajax_script' );
 }

// Override tutor templates
function tutor_template_load($template_location, $template){
	$template_location = __DIR__."/tutor/{$template}.php";
	return $template_location;
}

add_filter("tutor_get_template_path", "tutor_template_load", 10, 2);

