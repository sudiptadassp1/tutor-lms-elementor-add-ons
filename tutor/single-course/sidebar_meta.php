<?php

if(!function_exists("tutor_addons_single_sidebar_meta")){
    function tutor_addons_single_sidebar_meta(){
        $course_id = get_the_ID();
        $disable_course_duration = get_tutor_option('disable_course_duration');
        $course_duration = get_tutor_course_duration_context();
        $tutor_lesson_count = tutor_utils()->get_lesson_count_by_course($course_id);
        $disable_course_level = get_tutor_option('disable_course_level');
        $course_categories = get_tutor_course_categories();
    ?>
    <ul>
        <?php
            if( !empty($course_duration) && !$disable_course_duration){
                ?>
                    <li>
                        <span><i class="far fa-clock"></i>Duration</span><?php echo $course_duration; ?>
                    </li>
                <?php
            }
            if($tutor_lesson_count) {
                ?>
                    <li>
                        <span><i class="far fa-file-alt"></i>Lessons</span><?php _e($tutor_lesson_count); ?>
                    </li>
                <?php
            }
            if ( !$disable_course_level){
                ?>
                    <li>
                        <span><i class="fas fa-graduation-cap"></i>Skill level</span><?php echo get_tutor_course_level(); ?>
                    </li>
                <?php
            }
            if(is_array($course_categories) && count($course_categories)){
                ?>
                    <li>
                        <span><i class="fas fa-book"></i>Subject</span><span class='course_cat'>
                        <?php
                            foreach ($course_categories as $index => $course_category){
                                $category_name = $course_category->name;
                                if($index > 0){
                                    $category_name = ", ".$category_name;
                                }
                                _e($category_name);
                            }
                        ?></span>
                    </li>
                <?php
            }
        ?>
    </ul>
    <?php
    }
}