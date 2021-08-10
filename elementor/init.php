<?php
namespace Elementor\Tutor;
use Elementor\Tutor\Elementor_Helper;

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
		require_once(TUTOR_BASE_DIR.'elementor/helper.php');
		add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_style' ) );
		new Elementor_Helper();
	}

	public function editor_style(){
		$logo_img = plugins_url('../assets/media/logo.png', __FILE__);;
		wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .elementor-tutor-lms-addon-icon {content: url( '.$logo_img.');width: 28px;}' );
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
		require_once (__DIR__ . '/widget-base.php');
		$widgets = array(
			'courses' => 'Tutor_courses',
			'course-categories' => 'Tutor_courses_categories',
			'course-instructor' => 'Tutor_course_Instructor',
			'news-and-blog' => 'Tutor_News',
			'testimonials' => 'Tutor_Testimonials',
			'course-banner' => 'Tutor_Single_course_Banner',
			'instructor-archive' => 'Instructor_Archive',
			'course-archive' => 'Course_Archive',
		);

		foreach($widgets as $dirname => $template){
			$file = __DIR__.'/widgets/'.$dirname.'/class.php';
			if(file_exists($file)){
				require_once $file;
				$classname = __NAMESPACE__.'\widgets\\'.$template;
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $classname );
			}
		}		
	}

	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'tutor' ),
			'<strong>' . esc_html__( 'Elementor addons for tutor LMS', 'tutor' ) . '</strong>',
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