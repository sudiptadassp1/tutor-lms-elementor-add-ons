<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\Elementor_Helper;

class Course_Instructor_Style_1{

    public static function course_instructor_style(){
        $args = array(
            'role' => "tutor_instructor",
        );
        // echo "<pre>";
        $users_data = get_users($args);
        $flag = 1;         
        ?>
            <div class="course_instructor_section">
                <div class="row">
                    <?php
                        foreach($users_data as $user_data){
                            $teacher_metadata = get_user_meta($user_data->id); 
                            //print_r($teacher_metadata);
                            $thumbnail_avater = get_avatar_url($user_data->id); 
                            $teacher_original_image = str_replace('-150x150.', '.', $thumbnail_avater);
                            if($flag == 1){
                                ?>
                                    <div class="col-lg-6 col-sm-6 col-md-12 instructor_column first row_block first-block" >
                                        <img src="<?php _e($teacher_original_image); ?>" alt="">
                                        <div class="description_box">
                                            <h3 class="author-title">
                                                <a href="" class="">
                                                    <?php
                                                        _e($teacher_metadata['first_name'][0]." ".$teacher_metadata['last_name'][0]);
                                                    ?>
                                                </a>
                                            </h3>
                                            <div class="author-designation">
                                                <?php
                                                    _e($teacher_metadata['_tutor_profile_job_title'][0]);
                                                ?>
                                            </div> 
                                        </div>
                                     </div>
                                <?php
                            }else if(($flag > 1) && ($flag <= 5)){
                                if($flag == 2){
                                    ?>
                                    <div class="col-lg-6 col-sm-6 col-md-12 instructor_column">                                
                                        <div class='row'>
                                    <?php
                                }
                                    ?>  
                                        <div class=" col-lg-6 col-sm-6 col-md-12 row_block instructor_column rest_description_block second-block">
                                            <img src="<?php _e($teacher_original_image); ?>" alt="">
                                            <div class="description_box">
                                                <h4 class="author-title">
                                                    <a href="" class="">
                                                        <?php
                                                            _e($teacher_metadata['first_name'][0]." ".$teacher_metadata['last_name'][0]);
                                                        ?>
                                                    </a>
                                                </h4>
                                                <div class="author-designation">
                                                    <?php
                                                        _e($teacher_metadata['_tutor_profile_job_title'][0]);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php  
                                if($flag == 5){
                                    ?>
                                        </div></div>
                                    <?php
                                }                              
                            }
                            else{
                                ?>
                                    <div class=" col-lg-4 col-sm-4 col-md-12 row_block instructor_column rest_description_block third-block">
                                        <img src="<?php _e($teacher_original_image); ?>" alt="">
                                        <div class="description_box">
                                            <h4 class="author-title">
                                                <a href="" class="">
                                                    <?php
                                                        _e($teacher_metadata['first_name'][0]." ".$teacher_metadata['last_name'][0]);
                                                    ?>
                                                </a>
                                            </h4>
                                            <div class="author-designation">
                                                <?php
                                                    _e($teacher_metadata['_tutor_profile_job_title'][0]);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                            $flag++;
                        }   
                    ?>
                </div>
            </div>
        <?php 
    }    
}

