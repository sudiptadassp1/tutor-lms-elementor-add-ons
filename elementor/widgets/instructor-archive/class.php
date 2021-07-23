<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\Instructor_Archive_Style;
use Elementor\Tutor\Widget_Base;

class Instructor_Archive extends Widget_Base {

	public function __construct($data = [], $args = null){
        $this->widget_name = "instractor-archive";
        $this->widget_label = "Instructor Archive";
		parent::__construct($data, $args);
	}

    protected function _register_controls() {   
		require_once(TUTOR_BASE_DIR.'elementor/widgets/instructor-archive/tabs/content.php');
		require_once(TUTOR_BASE_DIR.'elementor/widgets/instructor-archive/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        require_once(TUTOR_BASE_DIR.'elementor/widgets/instructor-archive/style.php');
        (new Instructor_Archive_Style())->instructor_archive($settings); 
        
    }

}


