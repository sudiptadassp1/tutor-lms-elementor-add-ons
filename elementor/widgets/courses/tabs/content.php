<?php
	$this->start_controls_section(
		'content_section',
		[
			'label' => __( 'Content', 'tutor' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);

	$this->add_control(
		'course_grid_column',
		[
			'label' => __( 'Grid Column', 'tutor' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '3',
			'options' => [
				'1'  => __( '1', 'tutor' ),
				'2' => __( '2', 'tutor' ),
				'3' => __( '3', 'tutor' ),
				'4' => __( '4', 'tutor' ),
			],
		]
	);

	$this->add_control(
		'course_per_page',
		[
			'label' => __( 'Courses Per Page', 'tutor' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'min' => 1,
			'max' => 100,
			'default' => 3,
		]
	);

	$this->add_control(
		'button_title',
		[
			'label' => __( 'Button Text', 'tutor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( 'View Details', 'tutor' ),
			'placeholder' => __( 'Type your title here', 'tutor' ),
		]
	);

	$this->add_control(
        'view_all_course',
        [
            'label' => __( 'All Course Card', 'tutor' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

	$this->add_control(
		'enable_all_course',
		[
			'label' => __( 'Enable All Course', 'tutor' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Show', 'tutor' ),
			'label_off' => __( 'Hide', 'tutor' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
	);

	$this->add_control(
		'all_course_description',
		[
			'label' => __( 'Description', 'tutor' ),
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'rows' => 3,
			'default' => __( 'The World’s Largest Selection of Online Courses', 'tutor' ),
			'placeholder' => __( 'Type your description here', 'tutor' ),
		]
	);

	
	$this->add_control(
		'all_course_button_text',
		[
			'label' => __( 'Button Text', 'tutor' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( 'Browse All Course', 'tutor' ),
			'placeholder' => __( 'Type your text here', 'tutor' ),
		]
	);

	$this->add_control(
		'button-link',
		[
			'label' => __( 'Link', 'tutor' ),
			'type' => \Elementor\Controls_Manager::URL,
			'placeholder' => __( 'https://your-link.com', 'tutor' ),
			'show_external' => true,
			'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			],
		]
	);
	


	$this->end_controls_section();
	                                                                              
	                        