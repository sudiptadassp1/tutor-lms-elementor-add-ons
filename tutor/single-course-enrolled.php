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

require_once(TUTOR_BASE_DIR."tutor/single-course/init-template.php");
use Elementor\Tutor\Elementor_Helper;
get_header();

do_action('tutor_course/single/enrolled/before/wrap');
?>

<div <?php tutor_post_class('tutor-full-width-course-top tutor-course-top-info tutor-page-wrap'); ?>>
    <?php tutor_addons_single_banner(); ?>
    <div class="tutor-container single_course_body">
        <div class="tutor-row">
            <div class="tutor-col-8 tutor-col-md-100">
                <?php do_action('tutor_course/single/enrolled/before/inner-wrap'); ?>
                <?php tutor_course_enrolled_lead_info(); ?>
                <?php tutor_course_content(); ?>
                <?php tutor_course_benefits_html(); ?>
                <?php tutor_course_enrolled_nav(); ?>
                <?php tutor_course_topics(); ?>
                <?php tutor_course_instructors_html(); ?>
                <?php tutor_course_target_reviews_html(); ?>
                <?php tutor_course_target_review_form_html(); ?>
		        <?php do_action('tutor_course/single/enrolled/after/inner-wrap'); ?>
            </div>
            <div class="tutor-col-4">
                <div class="tutor-single-course-sidebar">
                    <?php do_action('tutor_course/single/enrolled/before/sidebar'); ?>
                    <div class="single_course_side_block_1 tutor-addons_single_course_enroll_box">
                        <?php tutor_course_enroll_box(); ?>
                        <hr/>
                            <?php tutor_addons_single_sidebar_meta(); ?>
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
                        <?php tutor_addons_single_sidebar_course_categories(); ?>
                    </div>

                    <?php
                        $category = get_tutor_course_categories();
                        Elementor_Helper::related_course($category);
                    ?>   
                    <?php do_action('tutor_course/single/enrolled/after/sidebar'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php do_action('tutor_course/single/enrolled/after/wrap'); ?>

<?php
get_footer();
