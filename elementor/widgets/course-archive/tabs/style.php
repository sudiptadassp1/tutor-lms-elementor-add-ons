<?php
    // Filters Style
    $this->start_controls_section(
        'filter_style_section',
        [
            'label' => __( 'Filter Style', 'tutor' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'filter_title_color',
        [
            'label' => __( 'Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .category_name' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'filter_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .category_name',
        ]
    );

    $this->add_control(
        'filter_align',
        [
            'label' => __( 'Filter Alignment', 'tutor' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __( 'Left', 'tutor' ),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'tutor' ),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'tutor' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'left',
            'toggle' => true,
        ]
    );

    $this->add_control(
        'filter-padding-dimention',
        [
            'label' => __( 'Padding', 'tutor' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .category_name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'filter-margin-dimention',
        [
            'label' => __( 'Margin', 'tutor' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .category_name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'style_section',
        [
            'label' => __( 'Front Face', 'tutor' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background',
            'label' => __( 'Background', 'tutor' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .card_front_face',
        ]
    );

    // Front title
    $this->add_control(
        'title_style_heading',
        [
            'label' => __( 'Title Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'title_color',
        [
            'label' => __( 'Title Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .front-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .front-title',
        ]
    );

    $this->add_control(
        'front_title_align',
        [
            'label' => __( 'Alignment', 'tutor' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __( 'Left', 'tutor' ),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'tutor' ),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'tutor' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'left',
            'toggle' => true,
        ]
    );

    // Course teacher
    $this->add_control(
        'teacher_style_heading',
        [
            'label' => __( 'Instructor Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'instructor_color',
        [
            'label' => __( 'Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .instructor-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'instructor_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .instructor-title',
        ]
    );

    $this->add_control(
        'front_instructor_align',
        [
            'label' => __( 'Alignment', 'tutor' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __( 'Left', 'tutor' ),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'tutor' ),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'tutor' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'left',
            'toggle' => true,
        ]
    );

    //Price Style
    $this->add_control(
        'price_style_heading',
        [
            'label' => __( 'Price Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'price_color',
        [
            'label' => __( 'Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .price-title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'price_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .price-title',
        ]
    );

    //lessons
    $this->add_control(
        'front_lessons_style_heading',
        [
            'label' => __( 'Lesson Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'lesson_color',
        [
            'label' => __( 'lessons Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .course-feature' => 'color: {{VALUE}}',
            ],
        ]
        );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'lesson_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .course-feature',
        ]
    );

    $this->add_control(
        'course-feature-dimention',
        [
            'label' => __( 'Padding', 'tutor' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .course-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();


    //back face start

    $this->start_controls_section(
        'back_style_section',
        [
            'label' => __( 'Hover Style', 'tutor' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background',
            'label' => __( 'Background', 'tutor' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .card_backend',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'back_background',
            'label' => __( 'Background', 'tutor' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .card_backend',
        ]
    );

    // Back title
    $this->add_control(
        'hover_title_style_heading',
        [
            'label' => __( 'Hover Title Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'back_title_color',
        [
            'label' => __( 'Title Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .back_title' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'back_category_color',
        [
            'label' => __( 'Category Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .back_course_category' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'back_title_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .back_title',
        ]
    );

    $this->add_control(
        'back_title_align',
        [
            'label' => __( 'Alignment', 'tutor' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __( 'Left', 'tutor' ),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'tutor' ),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'tutor' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'left',
            'toggle' => true,
        ]
    );

    // Course teacher
    $this->add_control(
        'back_teacher_style_heading',
        [
            'label' => __( 'Instructor Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );


    $this->add_control(
        'back_instructor_align',
        [
            'label' => __( 'Alignment', 'tutor' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __( 'Left', 'tutor' ),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'tutor' ),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'tutor' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'default' => 'left',
            'toggle' => true,
        ]
    );

    //Price Style
    $this->add_control(
        'back_price_style_heading',
        [
            'label' => __( 'Price Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'back_price_color',
        [
            'label' => __( 'Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .back_course_fee' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'price_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .back_course_fee',
        ]
    );


    $this->add_control(
        'hover_button_style',
        [
            'label' => __( 'Button Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'button_text_color',
        [
            'label' => __( 'Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .course_details' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'button_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .course_details',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'button_background',
            'label' => __( 'Background', 'tutor' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .course_details',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'button_border',
            'label' => __( 'Border', 'tutor' ),
            'selector' => '{{WRAPPER}} .course_details',
        ]
    );

    $this->end_controls_section();

    // Browse all course card
    $this->start_controls_section(
        'all_course_card',
        [
            'label' => __( 'All Course Block', 'tutor' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'description_text',
        [
            'label' => __( 'Description Text', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'description_text_color',
        [
            'label' => __( 'Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .all_course_des' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'description_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .all_course_des',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'all_course_background',
            'label' => __( 'Background', 'tutor' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .additional-info',
        ]
    );

     // Browse all course button
    $this->add_control(
        'all_button_text',
        [
            'label' => __( 'Button Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'all_button_text_color',
        [
            'label' => __( 'Color', 'tutor' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'scheme' => [
                'type' => \Elementor\Scheme_Color::get_type(),
                'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => [
                '{{WRAPPER}} .all_course_button' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'all_button_typography',
            'label' => __( 'Typography', 'tutor' ),
            'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .all_course_button',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'all_course_button_background',
            'label' => __( 'Background', 'tutor' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .all_course_button',
        ]
    );

    $this->add_control(
        'all-button-padding-dimention',
        [
            'label' => __( 'Padding', 'tutor' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .all_course_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_control(
        'all-button-margin-dimention',
        [
            'label' => __( 'Margin', 'tutor' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .all_course_button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_section();  

                                                            