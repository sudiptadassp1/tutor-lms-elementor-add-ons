<?php
    $this->start_controls_section(
        'style_section',
        [
            'label' => __( 'Testimonial Style', 'tutor' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 't_card_background',
            'label' => __('Card Background', 'tutor'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .swiper-slide',
        ]
    );

    // Icon Style Start

    $this->add_control(
        't_icon_style',
        [
            'label' => __( 'Icon Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        't_quote_icon_color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Icon Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} .testimonial-box.style-1 .icon-box .fa-quote-left' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        't_icon_size',
        [
            'label' => __( 'Icon Size', 'tutor' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 25,
            ],
            'selectors' => [
                '{{WRAPPER}} .testimonial-box.style-1 .icon-box .fa-quote-left' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    // Icon Style End

    // Comment Style Start

    $this->add_control(
        't_comment_style',
        [
            'label' => __( 'Comment Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        't_comment_color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Comment Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} .testimonial-box.style-1 .description p' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 't_comment_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .testimonial-box.style-1 .description p',
        ]
    );
    

    // Comment Style End

    // Name Style Start

    $this->add_control(
        't_name_style',
        [
            'label' => __( 'Name Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        't_name_color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Name Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} .testimonial-box .title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 't_name_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .testimonial-box .title',
        ]
    );

    // Name Style End

    // Designation Style Start

    $this->add_control(
        't_designation_style',
        [
            'label' => __( 'Designation Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        't_designation_color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Designation Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} .testimonial-box .designation' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 't_designation_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .testimonial-box .designation',
        ]
    );
    
    // Designation Style End

    // Rating Style Start

    $this->add_control(
        't_rating_style',
        [
            'label' => __( 'Rating Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        't_Unrated_color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Unrated Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} ul.testimonial-rating li .fa-star' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        't_rated_color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Rated Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} .testimonial-box .testimonial-rating li .rated' => 'color: {{VALUE}}',
            ],
        ]
    );    

    $this->add_control(
        't_rating_size',
        [
            'label' => __( 'Rating Icon Size', 'tutor' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 15,
            ],
            'selectors' => [
                '{{WRAPPER}} ul.testimonial-rating li .fa-star' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    
    // Rating Style End

    // Arrow Style Start

    $this->add_control(
        't_arrow_style',
        [
            'label' => __( 'Arrow Control Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 't_arrow_bg_color',
            'label' => __('Arrow Background Color', 'tutor'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .arrow-indicator-left, {{WRAPPER}} .arrow-indicator-right',
        ]
    );

    $this->add_control(
        't_arrow_padding',
        [
            'label' => __( 'Padding', 'tutor' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .arrow-indicator-left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .arrow-indicator-right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        't_arrow_size',
        [
            'label' => __( 'Arrow Icon Size', 'tutor' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 30,
            ],
            'selectors' => [
                '{{WRAPPER}} .arrow-icons .fa-chevron-right' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    // Arrow Style End

    $this->end_controls_section();