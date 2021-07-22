<?php
namespace Elementor\Tutor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_Base extends \Elementor\Widget_Base{
    public $widget_name;
    public $widget_label;
    public $widget_icon;
    public $widget_category;

    public function __construct($data = [], $args = null){
        $this->widget_icon = "elementor-tutor-lms-addon-icon";
        $this->widget_category = "tutor-addons";
        parent::__construct($data, $args);
    }

    public function get_name() {
        return $this->widget_name;
    }

	public function get_title() {
        return $this->widget_label;
    }

    public function get_icon() {
		return $this->widget_icon;
	}

	public function get_categories() {
		return [$this->widget_category];
	}
}