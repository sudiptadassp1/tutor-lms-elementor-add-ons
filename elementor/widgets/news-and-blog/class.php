<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\News_Template;
use Elementor\Tutor\Elementor_Helper;
use Elementor\Tutor\Widget_Base;

class Tutor_News extends Widget_Base {

    public function __construct($data = [], $args = null){
        $this->widget_name = "news_and_blog";
        $this->widget_label = "News and Blog";
		parent::__construct($data, $args);
	}

    protected function _register_controls() {   
        require_once(TUTOR_BASE_DIR.'elementor/helper.php');
        $helper = new Elementor_Helper(); 
		require_once(TUTOR_BASE_DIR.'elementor/widgets/news-and-blog/tabs/content.php');
		require_once(TUTOR_BASE_DIR.'elementor/widgets/news-and-blog/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        require_once(TUTOR_BASE_DIR.'elementor/widgets/news-and-blog/news_template.php');
        (new News_Template())->news_template($settings); 
        
    }

}


