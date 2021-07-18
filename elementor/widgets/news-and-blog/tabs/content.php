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

    $this->end_controls_section();