<?php
namespace Elementor\Tutor;
use Elementor\Tutor\widgets\Tutor_courses;
use Elementor\Tutor\widgets\Tutor_courses_categories;
use Elementor\Tutor\widgets\Tutor_course_Instructor;
use Elementor\Tutor\widgets\Tutor_News;
use Elementor\Tutor\widgets\Tutor_Testimonials;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Tutor_Elementor_addon {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '7.0';
	const MINIMUM_TUTOR_VERSION = '1.9.3';

	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );
		add_action( 'admin_enqueue_scripts', array( $this, 'tutor_enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'tutor_enqueue_scripts' ) );
	}

	public function tutor_enqueue_scripts(){
		wp_enqueue_style( 'tutor-elementor', plugin_dir_url( __FILE__ ) . '../assets/css/tutor-elementor.css' );
		wp_enqueue_style( 'tutor-animate-css', plugin_dir_url( __FILE__ ) . '../dependencies/animate/animate.min.css' );
		wp_enqueue_style( 'swiper-bundle-css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
		wp_enqueue_script( 'isotope-library', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', null, null, false );
		wp_enqueue_script( 'masonry-library', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', null, null, false );
		wp_enqueue_script( 'swiper-bundle-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', null, null, false );
		wp_enqueue_script( 'tutor-elementor-core-js', plugin_dir_url( __FILE__ ) . '../assets/js/tutor-lementor-addons-core.js', array( 'jquery' ), true );
		wp_enqueue_script( 'tutor-common-js', plugin_dir_url( __FILE__ ) . '../assets/js/tutor-common.js', '', '', true );
		wp_enqueue_script( 'tutor-wow-js', plugin_dir_url( __FILE__ ) . '../dependencies/wow/js/wow.min.js', '', true );
	}

	public function i18n() {

		load_plugin_textdomain( 'tutor' );

	}

	public function on_plugins_loaded() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}

	public function is_compatible() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}

		//Check for tutor lms version
		if ( version_compare( TUTOR_VERSION, self::MINIMUM_TUTOR_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_tutor_version' ] );
			return false;
		}

		return true;

	}

    public function register_tutor_widget_categories($elements_manager)
    {
		$elements_manager->add_category(
			'tutor-addons',
			[
				'title' => __( 'Tutor Add-ons', 'tutor' ),
				'icon' => 'fa fa-plug',
			]
		);
    }

	public function init() {
	
		$this->i18n();

        // Registering category
        add_action('elementor/elements/categories_registered', [$this, 'register_tutor_widget_categories']);

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

	}

	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/courses/class.php' );
		require_once( __DIR__ . '/widgets/course-categories/class.php' );
		require_once( __DIR__ . '/widgets/course-instructor/class.php' );
		require_once( __DIR__ . '/widgets/news-and-blog/class.php' );
		require_once( __DIR__ . '/widgets/testimonials/class.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tutor_courses() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tutor_courses_categories() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tutor_course_Instructor() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tutor_News() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tutor_Testimonials() );

	}

	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'tutor' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'tutor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'tutor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}


	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'tutor' ),
			'<strong>' . esc_html__( 'Elementor addons for tutor LMS', 'tutor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'tutor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}


	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'tutor' ),
			'<strong>' . esc_html__( 'Elementor addons for tutor LMS', 'tutor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'tutor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_tutor_version(){
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Tutor 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'tutor' ),
			'<strong>' . esc_html__( 'Elementor addons for tutor LMS', 'tutor' ) . '</strong>',
			'<strong>' . esc_html__( 'TUTOR', 'tutor' ) . '</strong>',
			 self::TUTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

}

Tutor_Elementor_addon::instance();