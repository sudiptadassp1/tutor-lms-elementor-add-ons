<?php
$this->start_controls_section(
    'style_section',
    [
        'label' => __( 'Style Section', 'tutor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

    //Start Style Tab
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

        $this->add_control(
            'instructor-padding-dimention',
            [
                'label' => __( 'Padding', 'tutor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .description_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    
        $this->add_control(
            'instructor-margin-dimention',
            [
                'label' => __( 'Margin', 'tutor' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .description_box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'instructor_typography',
                'label' => __( 'Typography', 'tutor' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .author-title a',
            ]
        );	

         // Instructor Designation
         $this->add_control(
			'instructor-designation-title',
			[
				'label' => __( 'Designation Style', 'tutor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );

        $this->add_control(
            'instructor_designation_color',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => esc_html__('Color', 'tutor'),
                'selectors' => [
                    '{{WRAPPER}} .author-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'instructor_designation_typography',
                'label' => __( 'Typography', 'tutor' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .author-designation',
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

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'instructor_bg_hover',
                'label' => __('Background', 'tutor'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .description_box::before',
            ]
        );

        // Instructor Name Hover
        $this->add_control(
			'instructor_hover-title',
			[
				'label' => __( 'Title Hover', 'tutor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );

        $this->add_control(
            'instructor_hover_color',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => esc_html__('Color Hover', 'tutor'),
                'selectors' => [
                    '{{WRAPPER}} .row_block:hover .author-title a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'instructor_hover_typography',
                'label' => __( 'Typography', 'tutor' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .row_block:hover .author-title a',
            ]
        );	

         // Instructor Designation Hover
         $this->add_control(
			'instructor-hover-designation-title',
			[
				'label' => __( 'Designation Style', 'tutor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );

        $this->add_control(
            'instructor_hover_designation_color',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => esc_html__('Color', 'tutor'),
                'selectors' => [
                    '{{WRAPPER}} .row_block:hover .author-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'instructor_hover_designation_typography',
                'label' => __( 'Typography', 'tutor' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .row_block:hover .author-designation',
            ]
        );	

        $this->end_controls_tab();

    $this->end_controls_tabs();

$this->end_controls_section();