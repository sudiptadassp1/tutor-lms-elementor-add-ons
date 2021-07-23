<?php
$this->start_controls_section(
    'content_section',
    [
        'label' => __( 'Instructor Archive', 'Tutor LMS Elementor Add-ons' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$this->add_control(
    'archive_title',
    [
        'label' => __( 'Title', 'tutor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Default title', 'tutor' ),
        'placeholder' => __( 'Type your title here', 'tutor' ),
    ]
);

$this->add_control(
    'column_per_row',
    [
        'label' => __( 'Column per Row', 'tutor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '3',
        'options' => [
            '1'  => __( '1', 'tutor' ),
            '2' => __( '2', 'tutor' ),
            '3' => __( '3', 'tutor' ),
            '4' => __( '4', 'tutor' ),
            '6' => __( '6', 'tutor' ),
        ],
    ]
);

$this->add_control(
    'title_align',
    [
        'label' => __( 'Alignment', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'left' => [
                'title' => __( 'Left', 'plugin-domain' ),
                'icon' => 'fa fa-align-left',
            ],
            'center' => [
                'title' => __( 'Center', 'plugin-domain' ),
                'icon' => 'fa fa-align-center',
            ],
            'right' => [
                'title' => __( 'Right', 'plugin-domain' ),
                'icon' => 'fa fa-align-right',
            ],
        ],
        'default' => 'center',
        'toggle' => true,
    ]
);


$this->end_controls_section();