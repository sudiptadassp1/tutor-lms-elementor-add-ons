<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\News_Template;
use Elementor\Tutor\Elementor_Helper;

class Tutor_News extends \Elementor\Widget_Base {

	public function get_name() {
        return 'news_and_blog';
    }

	public function get_title() {
        return __('News');
    }

    public function get_icon() {
		return 'eicon-single-post';
	}

	public function get_categories() {
		return [ 'tutor-addons' ];
	}

    protected function _register_controls() {   
        require_once(TUTOR_BASE_DIR.'elementor/helper.php');
        $helper = new Elementor_Helper(); 
		require_once(TUTOR_BASE_DIR.'elementor/widgets/news-and-blog/tabs/content.php');
		// require_once(TUTOR_BASE_DIR.'elementor/widgets/courses/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        require_once(TUTOR_BASE_DIR.'elementor/widgets/news-and-blog/news_template.php');
        (new News_Template())->news_template($settings); 
        
    }

}


