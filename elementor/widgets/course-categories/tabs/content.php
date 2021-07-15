<?php

$this->start_controls_section(
    'content_section',
    [
        'label' => __( 'Content', 'tutor' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$this->add_control(
    'category_grid_column',
    [
        'label' => __( 'Categories Grid Column', 'tutor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '3',
        'options' => [
            '2' => __( '2', 'tutor' ),
            '3' => __( '3', 'tutor' ),
            '4' => __( '4', 'tutor' ),
            '6' => __( '6', 'tutor' ),
        ],
    ]
);

$this->add_control(
    'course_categories',
    [
        'label' => __( 'Categories', 'tutor' ),
        'type' => \Elementor\Controls_Manager::SELECT2,
        'multiple' => true,
        'options' => $this->get_course_terms(),
        'default' => "",
    ]
);

$this->end_controls_section();