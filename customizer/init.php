<?php
namespace Tutor\Customizer;

class Customizer_control{
    private static $_instance = null;
    public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

    public function __construct(){
        add_action( 'customize_register', array( $this, 'add_course_customizer_sections' ) );
    }

    public function add_course_customizer_sections($wp_customize){
        $wp_customize->add_section('course_template_section', array(
        'title'    => __('Course Template', 'tutor'),
        'description' => '',
        ));

        // Course Archive Template
        $wp_customize->add_setting('course_archive_template_settings', array(
            'default'  => __("c_style_1"),
            'type'     => 'theme_mod',
            'transport' => 'refresh',
        ));   

        $wp_customize->add_control('course_archive_template_control', array(
            'label'  => "Course Archive Template: ",
            'section' => "course_template_section",
            'settings' => "course_archive_template_settings",
            'type'  => "select",
            'choices'    => array(
                'archive_style_1' => 'Style 1',
                'archive_style_2' => 'Style 2',
                'archive_style_3' => 'Style 3',
                'archive_style_4' => 'Style 4',
            ),
        ));   
        
        // Single Course Template
        $wp_customize->add_setting('single_course_template_settings', array(
            'default'  => __("cs_style_1"),
            'type'     => 'theme_mod',
            'transport' => 'refresh',
        ));   

        $wp_customize->add_control('single_course_template_control', array(
            'label'  => "Single Course Template: ",
            'section' => "course_template_section",
            'settings' => "single_course_template_settings",
            'type'  => "select",
            'choices'    => array(
                'single_style_1' => 'Style 1',
                'single_style_2' => 'Style 2',
                'single_style_3' => 'Style 3',
                'single_style_4' => 'Style 4',
            ),
        ));
    }
}

Customizer_control::instance();



             