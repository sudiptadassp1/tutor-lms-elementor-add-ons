<?php
$this->start_controls_section(
    'content_section',
    [
        'label' => __( 'Content Section', 'tutor' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$this->add_control(
    'select_style',
    [
        'label' => __( 'Display Style', 'tutor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'style_1',
        'options' => [
            'style_1'  => __( 'Grid View', 'tutor' ),
            'style_2' => __( 'Masonry View', 'tutor' ),
        ],
    ]
);

$this->end_controls_section();