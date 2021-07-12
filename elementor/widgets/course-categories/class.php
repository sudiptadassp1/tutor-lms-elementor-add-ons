<?php
namespace Elementor\Tutor\widgets;
 use Elementor\Tutor\widgets\Course_Categories_Style_1;

class Tutor_courses_categories extends \Elementor\Widget_Base {

	public function get_name() {
        return 'course-categories';
    }

	public function get_title() {
        return __('Course Categories');
    }

    public function get_icon() {
		return 'eicon-archive';
	}

	public function get_categories() {
		return [ 'tutor-addons' ];
	}

    protected function _register_controls() {   
       
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
				'label' => __( 'categories Grid Column', 'tutor' ),
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

		$this->end_controls_section();

	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        require_once(TUTOR_BASE_DIR.'elementor/widgets/course-categories/style_1.php');
        Course_Categories_Style_1::category_grid_style($settings); 
    }

}


