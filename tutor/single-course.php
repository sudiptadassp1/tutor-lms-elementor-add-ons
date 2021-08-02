<?php
/**
 * Template for displaying single course
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

use Elementor\Tutor\Elementor_Helper;
get_header();
global $post; 
?>

<div <?php tutor_post_class('tutor-full-width-course-top tutor-course-top-info tutor-page-wrap'); ?>>
    <div class="single-colurse-banner container-fluid banner-info-style-1">
        <div class="container">
            <div class="row">
              <div class="col-lg-7 d-flex align-items-center">
                <div class="content-box">
                  <div class="category-name">
                      <?php
                        $course_categories = get_tutor_course_categories();
                        if(is_array($course_categories) && count($course_categories)){
                            foreach ($course_categories as $index => $course_category){
                                $category_name = $course_category->name;
                                if($index > 0){
                                    $category_name = ", ".$category_name;
                                }
                                _e($category_name);
                            }
                        }
                      ?>
                  </div>
                  <h1 class="title">
                    <?php
                        the_title();
                    ?>
                  </h1>
                  <p class="description">
                    <?php
                        the_excerpt();
                    ?>
                  </p>
                  <ul class="inline-list list-info single_course_meta_box">
                    <li>
                        <?php 
                            echo tutor_utils()->get_tutor_avatar($post->post_author); 
                            echo get_the_author();
                        ?>
                    </li>
                    <li>
                        <?php
                            $course_rating = tutor_utils()->get_course_rating();
                            tutor_utils()->star_rating_generator($course_rating->rating_avg);
                            echo ' ('.$course_rating->rating_count.')';
                        ?>
                    </li>
                    <li>
                        <?php echo (int) tutor_utils()->count_enrolled_users_by_course(); ?>
                         enrolled students
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-5 text-center">
                <div class="figure-box">
                <?php 
                    get_tutor_course_thumbnail(); 
                    $video_info = tutor_utils()->get_video_info();
                    $vimeo_video_id = tutor_utils()->get_vimeo_video_id(tutor_utils()->avalue_dot('source_vimeo', $video_info));
                    $youtube_video_id = tutor_utils()->get_youtube_video_id(tutor_utils()->avalue_dot('source_youtube', $video_info));
                    if(empty($vimeo_video_id)){
                        if(!empty($youtube_video_id)){
                            $video_id = 'http://www.youtube.com/watch?v='.$youtube_video_id;
                        }
                    }else{
                        $video_id = 'https://player.vimeo.com/video/'.$vimeo_video_id;
                    }
                ?>
                  <a class="play-btn popup-youtube" href="<?php _e($video_id); ?>" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-play"></i></a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="container single_course_body">
        <div class="tutor-row">
            <div class="tutor-col-8 tutor-col-md-100">
	            <?php do_action('tutor_course/single/before/inner-wrap'); ?>
                <?php //tutor_course_lead_info(); ?>
	            <?php tutor_course_content(); ?>
	            <?php tutor_course_benefits_html(); ?>
	            <?php tutor_course_topics(); ?>
                <?php tutor_course_instructors_html(); ?>
                <?php tutor_course_target_reviews_html(); ?>
	            <?php do_action('tutor_course/single/after/inner-wrap'); ?>
            </div> <!-- .tutor-col-8 -->

            <div class="tutor-col-4">
                <div class="tutor-single-course-sidebar">
                    <?php do_action('tutor_course/single/before/sidebar'); ?>
                    <div class="single_course_side_block_1">
                        <?php tutor_course_price(); ?>
                        <?php tutor_single_course_add_to_cart(); ?>
                        <hr/>
                        <?php
                            $course_id = get_the_ID();
                            $disable_course_duration = get_tutor_option('disable_course_duration');
                            $course_duration = get_tutor_course_duration_context();
                            $tutor_lesson_count = tutor_utils()->get_lesson_count_by_course($course_id);
                            $disable_course_level = get_tutor_option('disable_course_level');
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
                        <hr/>
                        <div class="single_sidebar_payment">
                            <h5 class="title">Secure Payment:</h5>
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ).'assets/media/element3.jpg'; ?>" alt="Element" width="271" height="37">
                        </div>
                        <div id="single_sidebar_course_share">
                            <?php 
                                tutor_social_share(); 

                            ?>
                        </div>
                    </div>

                    <div class="single_course_side_block_1">
                        <div class="widget-course-category">
                            <div class="widget-section-heading heading-dark">
                                <h3 class="widget-title">Course Categories</h3>
                            </div>
                            <ul class="block-list list-item">
                                <?php
                                    $course_terms = Elementor_Helper::get_course_terms();
                                    // print_r($course_terms);

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
                    </div>

                    <?php
                        Elementor_Helper::related_course($course_categories);
                    ?>                    
                    <?php do_action('tutor_course/single/after/sidebar'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php do_action('tutor_course/single/after/wrap'); ?>

<?php
get_footer();
