<?php
    $this->start_controls_section(
        'style_section',
        [
            'label' => __( 'Style', 'tutor' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->start_controls_tabs(
        'side_post_style_tabs'
    );

        //Normal Style
        $this->start_controls_tab(
            'side_card_style__tab',
            [
                'label' => __('Side Column', 'tutor'),
            ]
        );

            // Side Card Style
            $this->add_control(
                'side-card-term-style',
                [
                    'label' => __( 'Side Card Term Style', 'tutor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'side_card_term_bg',
                    'label' => __(' Category Background', 'tutor'),
                    'types' => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .blog-box.style-1 .category-name',
                ]
            );

            $this->add_control(
                'side_card_term_color',
                [
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'label' => esc_html__('Color', 'tutor'),
                    'selectors' => [
                        '{{WRAPPER}} .blog-box.style-1 .category-name' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'side_card_term_typography',
                    'label' => __( 'Typography', 'tutor' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .blog-box.style-1 .category-name',
                ]
            );

            // Side card text  block Style
            $this->add_control(
                'side-card-text-style',
                [
                    'label' => __( 'Text Block Style', 'tutor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'side_card_text_block_bg',
                    'label' => __('Background', 'tutor'),
                    'types' => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .blog-box.style-1 .content-box',
                ]
            );

            $this->add_control(
                'side_card_text_block_color',
                [
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'label' => esc_html__('Title Color', 'tutor'),
                    'selectors' => [
                        '{{WRAPPER}} .blog-box.style-1 .content-box .title a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'side_card_text_block_typography',
                    'label' => __( 'Typography', 'tutor' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .blog-box.style-1 .content-box .title a',
                ]
            );

            // Date Style
            $this->add_control(
                'side-card-date-style',
                [
                    'label' => __( 'Date Style', 'tutor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'side_card_date_color',
                [
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'label' => esc_html__('Date Color', 'tutor'),
                    'selectors' => [
                        '{{WRAPPER}} .blog-box.style-1 .content-box ul.entry-meta li' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'side_card_date_block_typography',
                    'label' => __( 'Typography', 'tutor' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .blog-box.style-1 .content-box ul.entry-meta li',
                ]
            );

        $this->end_controls_tab();

        // Center Column Style
        $this->start_controls_tab(
            'center_blog_style_tab',
            [
                'label' => __('Center Column', 'tutor'),
            ]
        );

        // Category Style
        $this->add_control(
            'center_card_term_color',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => esc_html__('Category Color', 'tutor'),
                'selectors' => [
                    '{{WRAPPER}} .blog-box.style-2 .category-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'center_card_term_typography',
                'label' => __( 'Category Typography', 'tutor' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .blog-box.style-2 .category-name',
            ]
        );

        // Title Style
        $this->add_control(
                'center_card_text_block_color',
                [
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'label' => esc_html__('Title Color', 'tutor'),
                    'selectors' => [
                        '{{WRAPPER}} .blog-box.style-2 .content-box .title a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'center_card_text_block_typography',
                    'label' => __( 'Typography', 'tutor' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .blog-box.style-2 .content-box .title a',
                ]
            );

            // Date Style
            $this->add_control(
                'center_card_date_color',
                [
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'label' => esc_html__('Date Color', 'tutor'),
                    'selectors' => [
                        '{{WRAPPER}} .blog-box.style-2 .content-box ul.entry-meta li' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'center_card_date_block_typography',
                    'label' => __( 'Typography', 'tutor' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .blog-box.style-2 .content-box ul.entry-meta li',
                ]
            );

        $this->end_controls_tab();

    $this->end_controls_tabs();


    $this->add_control(
        'button-heading-style',
        [
            'label' => __( 'Button Style', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    // Button Style
    $this->start_controls_tabs(
        'button_style_tabs'
    );

        //Normal Style
        $this->start_controls_tab(
            'button_normal_style_tab',
            [
                'label' => __('Normal', 'tutor'),
            ]
        );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'button_normal_bg',
                    'label' => __(' Category Background', 'tutor'),
                    'types' => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .view_all_button a.view_all_post_btn',
                ]
            );

            $this->add_control(
                'button_normal_color',
                [
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'label' => esc_html__('Color', 'tutor'),
                    'selectors' => [
                        '{{WRAPPER}} .view_all_button a.view_all_post_btn' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_normal_typography',
                    'label' => __( 'Typography', 'tutor' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .view_all_button a.view_all_post_btn',
                ]
            );

            $this->add_control(
                'button_align',
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
                    'default' => 'center',
                    'toggle' => true,
                ]
            );

        $this->end_controls_tab();

        // Hover Style
        $this->start_controls_tab(
            'button_hover_style_tab',
            [
                'label' => __('Hover', 'tutor'),
            ]
        );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'button_hover_bg',
                    'label' => __(' Category Background', 'tutor'),
                    'types' => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .view_all_button:hover a.view_all_post_btn',
                ]
            );

            $this->add_control(
                'button_hover_color',
                [
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'label' => esc_html__('Color', 'tutor'),
                    'selectors' => [
                        '{{WRAPPER}} .view_all_button:hover a.view_all_post_btn' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_hover_typography',
                    'label' => __( 'Typography', 'tutor' ),
                    'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .view_all_button:hover a.view_all_post_btn',
                ]
            );

        $this->end_controls_tab();

    $this->end_controls_section();