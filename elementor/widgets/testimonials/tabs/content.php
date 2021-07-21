<?php
$this->start_controls_section(
    'content_section',
    [
        'label' => __( 'testimonials', 'Tutor LMS Elementor Add-ons' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    ]
);

$repeater = new \Elementor\Repeater();

$repeater->add_control(
    'testimonial-image',
    [
        'label' => __( 'Choose Image', 'tutor' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
            'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
    ]
);

$repeater->add_control(
    'testimonial_title', [
        'label' => __( 'Name', 'tutor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( '' , 'tutor' ),
        'label_block' => true,
    ]
);

$repeater->add_control(
    'testimonial_designation', [
        'label' => __( 'Designation', 'tutor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( '' , 'tutor' ),
        'label_block' => true,
    ]
);

$repeater->add_control(
    'testimonial_comment', [
        'label' => __( 'Comments', 'tutor' ),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => __( '' , 'tutor' ),
        'show_label' => false,
    ]
);

$repeater->add_control(
    'list_color',
    [
        'label' => __( 'Color', 'tutor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
        ],
    ]
);

$repeater->add_control(
    'testimonial-rating',
    [
        'label' => __( 'Rating Number', 'tutor' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '5',
        'options' => [
            '1'  => __( '1', 'tutor' ),
            '2' => __( '2', 'tutor' ),
            '3' => __( '3', 'tutor' ),
            '4' => __( '4', 'tutor' ),
            '5' => __( '5', 'tutor' ),
        ],
    ]
);

$this->add_control(
    'testimonial-list',
    [
        'label' => __( 'Testimonials List', 'tutor' ),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
            [
                'list_title' => __( 'Item #1', 'tutor' ),
                'list_content' => __( 'Item content. Click the edit button to change this text.', 'tutor' ),
            ],
        ],
        'title_field' => '{{{ list_title }}}',
    ]
);

$this->end_controls_section();