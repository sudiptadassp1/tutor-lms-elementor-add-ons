<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\Course_Instructor_Style_1;

class Tutor_course_Instructor extends \Elementor\Widget_Base {

	public function get_name() {
        return 'course-instructor';
    }

	public function get_title() {
        return __('Course Instructor');
    }

    public function get_icon() {
		return 'eicon-gallery-masonry';
	}

	public function get_categories() {
		return [ 'tutor-addons' ];
	}

    protected function _register_controls() {   
		require_once(TUTOR_BASE_DIR.'elementor/widgets/course-instructor/tabs/content.php');
		require_once(TUTOR_BASE_DIR.'elementor/widgets/course-instructor/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
		
		if($settings['select_style'] == "style_1"){
			require_once(TUTOR_BASE_DIR.'elementor/widgets/course-instructor/style/style_1.php');
		}else{
			require_once(TUTOR_BASE_DIR.'elementor/widgets/course-instructor/style/style_2.php');
		}
      
		(new Course_Instructor_Style_1())->course_instructor_style();
    }

}        


