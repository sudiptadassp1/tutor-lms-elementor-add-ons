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

// add_filter( 'template_include', 'course_template' );
function course_template( $template ){

	if(is_singular('courses')){
		$new_template = trailingslashit(__DIR__).'templates/single-courses.php';
	}
	
	return $new_template;
}