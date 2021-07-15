<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\Course_Style_1;

class Tutor_courses extends \Elementor\Widget_Base {

	public function get_name() {
        return 'courses';
    }

	public function get_title() {
        return __('Courses');
    }

    public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'tutor-addons' ];
	}

    protected function _register_controls() {   
		require_once(TUTOR_BASE_DIR.'elementor/widgets/courses/tabs/content.php');
		require_once(TUTOR_BASE_DIR.'elementor/widgets/courses/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        require_once(TUTOR_BASE_DIR.'elementor/widgets/courses/style_1.php');
        Course_Style_1::course_grid_style($settings); 
    }

}


