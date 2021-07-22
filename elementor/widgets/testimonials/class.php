<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\Testimonials_Style;
use Elementor\Tutor\Widget_Base;

class Tutor_Testimonials extends Widget_Base {

	public function __construct($data = [], $args = null){
        $this->widget_name = "testimonials";
        $this->widget_label = "Testimonials";
		parent::__construct($data, $args);
	}

    protected function _register_controls() {   
		require_once(TUTOR_BASE_DIR.'elementor/widgets/testimonials/tabs/content.php');
		// require_once(TUTOR_BASE_DIR.'elementor/widgets/testimonials/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        require_once(TUTOR_BASE_DIR.'elementor/widgets/testimonials/style.php');
        (new Testimonials_Style())->testimonials_style($settings); 
        
    }

}


