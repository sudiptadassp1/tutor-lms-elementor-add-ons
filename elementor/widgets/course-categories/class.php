<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\widgets\Course_Categories_Style_1;
use Elementor\Tutor\Widget_Base;

class Tutor_courses_categories extends Widget_Base {

	public function __construct($data = [], $args = null){
        $this->widget_name = "course-categories";
        $this->widget_label = "Course Categories";
		parent::__construct($data, $args);
	}

	public function get_course_terms(){
		$course_terms = get_terms( array( 
            'taxonomy' => 'course-category',
            'parent'   => 0,
            'hide_empty' => $empty,
        ) );
		$term_loop = array();
		foreach($course_terms as $i=>$course_term){
			$term_loop[$course_term->term_id] = $course_term->name;
		}

		return $term_loop;
        
	}

    protected function _register_controls() {   
		require_once(TUTOR_BASE_DIR.'elementor/widgets/course-categories/tabs/content.php');
		require_once(TUTOR_BASE_DIR.'elementor/widgets/course-categories/tabs/style.php');
	}

    protected function render() {
		$settings = $this->get_settings_for_display();
        require_once(TUTOR_BASE_DIR.'elementor/widgets/course-categories/style_1.php');
        Course_Categories_Style_1::category_grid_style($settings); 
    }

}


