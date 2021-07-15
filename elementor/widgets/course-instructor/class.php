<?php
namespace Elementor\Tutor\widgets;

class Tutor_course_Instructor extends \Elementor\Widget_Base {

	public function get_name() {
        return 'course-instructor';
    }

	public function get_title() {
        return __('Course Instructor');
    }

    public function get_icon() {
		return 'eicon-gallery-masonry';
	}

	public function get_categories() {
		return [ 'tutor-addons' ];
	}

    protected function _register_controls() {   
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'tutor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //Start Icon Style Tab
		$this->start_controls_tabs(
			'icon_style_tabs'
		);

		//Normal Style
		$this->start_controls_tab(
			'icon_style_normal_tab',
			[
				'label' => __('Normal', 'plugin-name'),
			]
		);
		$this->add_control(
			'icon_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'homfinder-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box .icon-holder i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .icon-el-style-2.rt-info-box .service-box .icon-holder span i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_bg',
				'label' => __('Background', 'plugin-domain'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .rt-info-box .icon-holder i, {{WRAPPER}} .rt-info-box.icon-el-style-2 .icon-holder span',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon-border',
				'label' => __('Icon Border', 'homfinder-core'),
				'selector' => '{{WRAPPER}} .rt-info-box .icon-holder i, {{WRAPPER}} .rt-info-box.icon-el-style-2 .icon-holder span',
			]
		);

		$this->end_controls_tab();

		//Hover Style
		$this->start_controls_tab(
			'icon_style_hover_tab',
			[
				'label' => __('Hover', 'plugin-name'),
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Color Hover', 'homfinder-core'),
				'selectors' => [
					'{{WRAPPER}} .rt-info-box:hover .icon-holder i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .icon-el-style-2.rt-info-box .service-box:hover span i' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'icon_bg_hover',
				'label' => __('Background', 'plugin-domain'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .rt-info-box:hover .icon-holder i, {{WRAPPER}} .rt-info-box.icon-el-style-2:hover .icon-holder span',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon-border-hover',
				'label' => __('Icon Border on Hover', 'homfinder-core'),
				'fields_options' => [
					'color' => [
						'dynamic' => [],
					],
				],
				'selector' => '{{WRAPPER}} .rt-info-box:hover .icon-holder i, {{WRAPPER}} .rt-info-box.icon-el-style-2:hover .icon-holder span',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		//End Icon Style Tab

        $this->end_controls_section();
		// require_once(TUTOR_BASE_DIR.'elementor/widgets/courses/tabs/content.php');
		// require_once(TUTOR_BASE_DIR.'elementor/widgets/courses/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        
        $args = array(
            'role' => "tutor_instructor",
        );
        //echo "<pre>";
        $users_data = get_users($args);
        foreach($users_data as $user_data){
            //print_r(get_user_meta($user_data->id));
        }        
    }

}        


