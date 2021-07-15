<?php
$this->start_controls_section(
    'style_section',
    [
        'label' => __( 'Style', 'tutor' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name' => 'background',
        'label' => __( 'Background', 'tutor' ),
        'types' => [ 'classic', 'gradient' ],
        'selector' => '{{WRAPPER}} .category-box',
    ]
);

$this->add_control(
    'icon_align',
    [
        'label' => __( 'Icon Alignment', 'tutor' ),
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

$this->add_control(
    'text-style',
    [
        'label' => __( 'Text Style', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'category_title_color',
    [
        'label' => __( 'Title Color', 'tutor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
            '{{WRAPPER}} .category_title_color' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'category_text_align',
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

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'category_title_typography',
        'label' => __( 'Typography', 'tutor' ),
        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
        'selector' => '{{WRAPPER}} .category_title_color',
    ]
);

//====================

$this->add_control(
    'cat-sub-text-style',
    [
        'label' => __( 'Sub-Text Style', 'plugin-name' ),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->add_control(
    'category_sub_title_color',
    [
        'label' => __( 'Title Color', 'tutor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
            'type' => \Elementor\Scheme_Color::get_type(),
            'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'selectors' => [
            '{{WRAPPER}} .category_sub_title' => 'color: {{VALUE}}',
        ],
    ]
);

$this->add_control(
    'category_sub_text_align',
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

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'category_title_typography',
        'label' => __( 'Typography', 'tutor' ),
        'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
        'selector' => '{{WRAPPER}} .category_sub_title',
    ]
);
$this->end_controls_section();