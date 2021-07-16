<?php
$this->start_controls_section(
    'style_section',
    [
        'label' => __( 'Style Section', 'tutor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

    //Start Icon Style Tab
    $this->start_controls_tabs(
        'instructor_style_tabs'
    );

        //Normal Style
        $this->start_controls_tab(
            'instructor_style_normal_tab',
            [
                'label' => __('Normal', 'tutor'),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'instructor_bg',
                'label' => __('Background', 'tutor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .description_box',
            ]
        );

        // Instructor Name
        $this->add_control(
			'instructor-title',
			[
				'label' => __( 'Title Style', 'tutor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );

        $this->add_control(
            'instructor_color',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => esc_html__('Color', 'tutor'),
                'selectors' => [
                    '{{WRAPPER}} .author-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
		

        $this->end_controls_tab();

        //Hover Style
        $this->start_controls_tab(
            'instructor_style_hover_tab',
            [
                'label' => __('Hover', 'tutor'),
            ]
        );

        $this->add_control(
            'instructor_hover_color',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => esc_html__('Color Hover', 'tutor'),
                'selectors' => [
                    '{{WRAPPER}} .rt-info-box:hover .icon-holder i' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon-el-style-2.rt-info-box .service-box:hover span i' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'instructor_bg_hover',
                'label' => __('Background', 'tutor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .rt-info-box:hover .icon-holder i, {{WRAPPER}} .rt-info-box.icon-el-style-2:hover .icon-holder span',
            ]
        );

        $this->end_controls_tab();

    $this->end_controls_tabs();
    //End Icon Style Tab

$this->end_controls_section();