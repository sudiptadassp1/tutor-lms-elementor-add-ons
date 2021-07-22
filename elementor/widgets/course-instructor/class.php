<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\Course_Instructor_Style_1;
use Elementor\Tutor\Widget_Base;

class Tutor_course_Instructor extends Widget_Base {

	public function __construct($data = [], $args = null){
        $this->widget_name = "course-instructor";
        $this->widget_label = "Course Instructor";
		parent::__construct($data, $args);
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


