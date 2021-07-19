<?php
    $this->start_controls_section(
        'content_section',
        [
            'label' => __( 'Content', 'tutor' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'post-type',
        [
            'label' => __( 'Select Post type', 'tutor' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'post',
            'options' => $helper->get_all_post_types(),
        ]
    );

                                          
    // Button settings
    $this->add_control(
        'button-settings',
        [
            'label' => __( 'Button Settings', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );
                                                                                           
    $this->add_control(
        'button_text',
        [
            'label' => __( 'Button Text', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'View All', 'plugin-domain' ),
            'placeholder' => __( 'Type your title here', 'plugin-domain' ),
        ]
    );

    $this->add_control(
        'button_link',
        [
            'label' => __( 'Link', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
            'show_external' => true,
            'default' => [
                'url' => '',
            ],
        ]
    );


    $this->end_controls_section();