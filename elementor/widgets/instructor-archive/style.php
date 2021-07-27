<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\Elementor_Helper;

class Instructor_Archive_Style{
    public function instructor_archive($settings){
        $args = array(
            'role' => "tutor_instructor",
        );
        $instructor_data = get_users($args);
        ?>
            <div class="course_instructor_archive_block">
                <h2 class="instructor_archive_title" style="text-align:<?php _e($settings['title_align']); ?>"><?php _e($settings['archive_title']); ?></h2>
                <div class="row">
                    <?php
                        foreach($instructor_data as $instructor){
                            $teacher_metadata = get_user_meta($instructor->id); 
                            $thumbnail_avater = get_avatar_url($instructor->id); 
                            $teacher_original_image = str_replace('-150x150.', '.', $thumbnail_avater);
                            $column_number = 12/$settings['column_per_row'];

                            $course_count = tutor_utils()->get_course_count_by_instructor($instructor->id);
                            $student_count = tutor_utils()->get_total_students_by_instructor($instructor->id);
                            $instructor_rating = tutor_utils()->get_instructor_ratings($instructor->id);

                            ?>
                                <div class="col-lg-<?php _e($column_number); ?>" >
                                    <div class="instructor-box style-1">
                                        <div class="header-content">
                                            <div class="figure-box">
                                                <a href="#"><img src="<?php _e($teacher_original_image); ?>" alt="Instructor" width="100" height="100"></a>
                                            </div>
                                        <div class="content-box">
                                            <h3 class="title">
                                                <a href="/profile/<?php _e($instructor->user_login); ?>">
                                                    <?php
                                                        _e($teacher_metadata['first_name'][0]." ".$teacher_metadata['last_name'][0]);
                                                    ?>
                                                </a>
                                            </h3>
                                            <h4 class="designation">
                                                <?php
                                                    _e($teacher_metadata['_tutor_profile_job_title'][0]);
                                                ?>
                                            </h4>
                                            <!-- <p class="qualification">Master of Education Degree</p> -->
                                            <div class="tutor-rating-container">      
                                                <div class="ratings">
                                                    <span class="rating-generated">
                                                        <?php tutor_utils()->star_rating_generator($instructor_rating->rating_avg); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-content">
                                        <ul class="entry-meta inline-list">
                                            <li><i class="far fa-file-alt"></i><?php _e($course_count); ?>  Courses</li>
                                            <li><i class="far fa-user"></i><?php _e($student_count); ?>  Students</li>
                                        </ul>
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

