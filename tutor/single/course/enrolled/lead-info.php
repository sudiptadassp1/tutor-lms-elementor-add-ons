<?php
/**
 * Template for displaying lead info
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.5
 */

if ( ! defined( 'ABSPATH' ) )
	exit;

global $wp_query;
global $post, $authordata;

$profile_url = tutor_utils()->profile_url($authordata->ID);
?>
<div class="tutor-single-course-segment tutor-single-course-lead-info">
    <div class="tutor-course-enrolled-info">
		<?php $count_completed_lesson = tutor_course_completing_progress_bar(); ?>

        <!--<div class="tutor-lead-info-btn-group">
			<?php
		/*			if ( $wp_query->query['post_type'] !== 'lesson') {
						$lesson_url = tutor_utils()->get_course_first_lesson();
						if ( $lesson_url ) {
							*/?>
                    <a href="<?php /*echo $lesson_url; */?>" class="tutor-button"><?php /*_e( 'Continue to lesson', 'tutor' ); */?></a>
                <?php /*}
            }
            */?>
            <?php /*tutor_course_mark_complete_html(); */?>
        </div>-->
    </div>

	<?php do_action('tutor_course/single/lead_meta/after'); ?>

	<?php do_action('tutor_course/single/excerpt/after'); ?>

</div>