<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\Elementor_Helper;

class Course_Categories_Style_1{

    public static function category_grid_style($course_settings){
        require_once(TUTOR_BASE_DIR.'elementor/helper.php');
        $column_row_count = 12/$course_settings['category_grid_column'];
        $terms_id_array = $course_settings['course_categories'];
        $course_terms = array();
        if(empty($course_settings['course_categories'])){
            $course_terms = Elementor_Helper::get_course_terms(false);
        }else{
            foreach($course_settings['course_categories'] as $term_ids){
                $term_object = Elementor_Helper::get_course_terms_filter($term_ids);
                array_push($course_terms, $term_object);
            }
        }

        ?>
            <div class="course_category_block">
                <div class="row">
                <?php
                    foreach($course_terms as $course_term){
                        $term_image_id = get_term_meta( $course_term->term_id, 'thumbnail_id', true );
                        $term_thumbnail_url = wp_get_attachment_image_src( $term_image_id, 'large' );
                        ?>
                            <div class="col-sm-<?php _e($column_row_count); ?> category-box-block">
                                <div class="category-box">
                                    <div class="icon-box" style="text-align:<?php _e($course_settings['icon_align']);?>">
                                        <img src="<?php _e($term_thumbnail_url[0]); ?>" alt="">
                                    </div>  
                                    
                                    <div class="content-box">                                
                                        <?php
                                            _e("<h3 class='title' href='' style='text-align:".$course_settings['category_text_align']."'><a class='category_title_color' href='".get_term_link($course_term->term_id)."'>");  
                                                _e($course_term->name, 'tutor');
                                            _e("</a></h3>");
                                            _e("<p class='sub-title category_sub_title' style='text-align:".$course_settings['category_sub_text_align']."'>".$course_term->count."+ Courses</p>");  
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