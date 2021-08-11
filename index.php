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

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

$elementor_active = is_plugin_active( 'elementor/elementor.php' );
$tutor_active = is_plugin_active( 'tutor/tutor.php' );
if ($elementor_active && $tutor_active) {
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
	
		if(!is_admin()){
			wp_enqueue_style( 'bootstrap-css-library', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css' );
			wp_enqueue_style( 'font-awesome-css-library', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' );
			wp_enqueue_script( 'bootstrap-js-library', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js', null, null, false );
		}
	}
	
	function ajax_script_enqueuer() {
		wp_register_script( "ajax_script", plugin_dir_url( __FILE__ ).'assets/js/ajax-filter.js', array('jquery') );
		wp_localize_script( 'ajax_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));       
	
		wp_register_script( "wishlist_ajax_script", plugin_dir_url( __FILE__ ).'assets/js/wishlist.js', array('jquery') );
		wp_localize_script( 'wishlist_ajax_script', 'wishlistAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));     
	 
		wp_enqueue_script( 'ajax_script' );
		wp_enqueue_script( 'wishlist_ajax_script' );
	 }
	
	// Override tutor templates
	function tutor_template_load($template_location, $template){
		$template_location = __DIR__."/tutor/{$template}.php";
		return $template_location;
	}
	
	add_filter("tutor_get_template_path", "tutor_template_load", 10, 2);
	
	
	// Tag Archive
	add_filter( 'template_include', 'load_course_tag_archive_template', 99 );
	
	
	function load_course_tag_archive_template($template){
		global $wp_query;
		$post_type = get_query_var('post_type');
		$course_tag = get_query_var('course-tag');
	
		if ( ($post_type === "courses" || ! empty($course_tag) )  && $wp_query->is_archive){
			$template = tutor_get_template('archive-course');
			return $template;
		}
	
		return $template;
	}
}else{
	add_action('admin_notices', 'check_required_plugin_notice');
	function check_required_plugin_notice(){
		$message = sprintf(
			esc_html__( '"%1$s" requires both "%2$s" and "%3$s" to be installed and activated.', 'tutor' ),
			'<strong>' . esc_html__( 'Elementor addons for tutor LMS', 'tutor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'tutor' ) . '</strong>',
			'<strong>' . esc_html__( 'Tutor LMS', 'tutor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}
