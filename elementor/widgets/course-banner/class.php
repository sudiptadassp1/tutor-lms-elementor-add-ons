<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\Widget_Base;
use Elementor\Tutor\widgets\Course_Banner_style;
class Tutor_Single_course_Banner extends Widget_Base{
    public function __construct($data = [], $args = null){
        $this->widget_name = "course_banner";
        $this->widget_label = "Course Banner";
		parent::__construct($data, $args);
	}

    protected function _register_controls() {   
		// require_once(TUTOR_BASE_DIR.'elementor/widgets/course-categories/tabs/content.php');
		// require_once(TUTOR_BASE_DIR.'elementor/widgets/course-categories/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        require_once(TUTOR_BASE_DIR.'elementor/widgets/course-banner/style_1.php');
        Course_Banner_style::course_banner($settings); 
    }
}