<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\Testimonials_Style;

class Tutor_Testimonials extends \Elementor\Widget_Base {

	public function get_name() {
        return 'testimonials';
    }

	public function get_title() {
        return __('Testimonials');
    }

    public function get_icon() {
		return 'eicon-blockquote';
	}

	public function get_categories() {
		return [ 'tutor-addons' ];
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


