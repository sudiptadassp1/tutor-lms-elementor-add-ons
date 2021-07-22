<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\Course_Style_1;
use Elementor\Tutor\Widget_Base;

class Tutor_courses extends Widget_Base {
	public function __construct($data = [], $args = null){
        $this->widget_name = "courses";
        $this->widget_label = "Courses";
		parent::__construct($data, $args);
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


