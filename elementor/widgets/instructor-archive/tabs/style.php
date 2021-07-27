<?php
    $this->start_controls_section(
        'style_section',
        [
            'label' => __( 'Style', 'tutor' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    // Title Style
    $this->add_control(
        'title-style',
        [
            'label' => __( 'Title Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'title-color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} .instructor_archive_title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'archive_title_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .instructor_archive_title',
        ]
    );

    // Card Style
    $this->add_control(
        'card-style',
        [
            'label' => __( 'Card Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'card_bg',
            'label' => __(' Card Background', 'tutor'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .instructor-box.style-1',
        ]
    );

    // Name Style
    $this->add_control(
        'name-style',
        [
            'label' => __( 'Name Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'name-color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} .instructor-box.style-1 .content-box .title a' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'archive_name_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .instructor-box.style-1 .content-box .title a',
        ]
    );

    // Designation Style
    $this->add_control(
        'designation-style',
        [
            'label' => __( 'Designation Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'designation-color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} .instructor-box.style-1 .content-box .designation' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'archive_designation_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .instructor-box.style-1 .content-box .designation',
        ]
    );

    // Meta Style
    $this->add_control(
        'meta-style',
        [
            'label' => __( 'Meta Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'meta-color',
        [
            'type' => \Elementor\Controls_Manager::COLOR,
            'label' => esc_html__('Color', 'tutor'),
            'selectors' => [
                '{{WRAPPER}} .instructor-box.style-1 .footer-content .entry-meta li' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'archive_meta_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .instructor-box.style-1 .footer-content .entry-meta li',
        ]
    );
                                                                                          
    // Image Background Color

    $this->add_control(
        'image-bg-style',
        [
            'label' => __( 'Image Background Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'image_bg',
            'label' => __(' Image Background Color', 'tutor'),
            'types' => ['classic', 'gradient'],
            'selector' => '{{WRAPPER}} .instructor-box.style-1 .figure-box:before',
        ]
    );

    $this->end_controls_section();
