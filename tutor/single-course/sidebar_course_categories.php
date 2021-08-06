<?php
use Elementor\Tutor\Elementor_Helper;

if(!function_exists("tutor_addons_single_sidebar_course_categories")){
    function tutor_addons_single_sidebar_course_categories(){
        ?>
            <div class="widget-course-category">
                <div class="widget-section-heading heading-dark">
                    <h3 class="widget-title">Course Categories</h3>
                </div>
                <ul class="block-list list-item">
                    <?php
                        $course_terms = Elementor_Helper::get_course_terms();

                        foreach($course_terms as $terms){
                            $term_link = get_term_link($terms->term_id);
                            ?>
                                <li class="menu-item">
                                    <a href="<?php _e($term_link); ?>"><?php _e($terms->name); ?><span>(<?php _e($terms->count); ?>)</span></a>
                                </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
        <?php
    }
}