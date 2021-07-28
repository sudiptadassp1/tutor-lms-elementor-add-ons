<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\Course_Archive_Style;
use Elementor\Tutor\Widget_Base;
use Elementor\Tutor\Elementor_Helper;

class Course_Archive extends Widget_Base {

	public function __construct($data = [], $args = null){
        $this->widget_name = "course-archive";
        $this->widget_label = "Course Archive";
		parent::__construct($data, $args);
	}

    protected function _register_controls() {   
		require_once(TUTOR_BASE_DIR.'elementor/widgets/course-archive/tabs/content.php');
		require_once(TUTOR_BASE_DIR.'elementor/widgets/course-archive/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        require_once(TUTOR_BASE_DIR.'elementor/widgets/course-archive/style.php');
        (new Course_Archive_Style())->course_archive($settings);  
    }

}

                                                                                                                                  