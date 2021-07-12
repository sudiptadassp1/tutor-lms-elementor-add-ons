<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\Elementor_Helper;

class Course_Categories_Style_1{

    public static function category_grid_style($course_settings){
        require_once(TUTOR_BASE_DIR.'elementor/helper.php');
        $column_row_count = 12/$course_settings['category_grid_column'];
        $course_terms = Elementor_Helper::get_course_terms(false);
        ?>
            <div class="course_category_block">
                <div class="row">
                <?php
                    foreach($course_terms as $course_term){
                        ?>
                            <div class="col-sm-<?php _e($column_row_count); ?> category-box-block">
                                <div class="category-box">
                                    <div class="icon-box">
                                    </div>  
                                    
                                    <div class="content-box">                                
                                        <?php
                                            _e("<h3 class='title'><a href=''>");  
                                                _e($course_term->name, 'tutor');
                                            _e("</a></h3>");
                                            _e("<p class='sub-title'>".$course_term->count."+ Courses</p>");  
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                </div>
            </div>
        <?php
    }
    
}

new Course_Categories_Style_1();