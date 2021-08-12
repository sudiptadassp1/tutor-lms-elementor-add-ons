<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\Elementor_Helper;

class Course_Style_1{

    public static function course_grid_style($course_settings){
        require_once(TUTOR_BASE_DIR.'elementor/helper.php');
        $course_terms = Elementor_Helper::get_course_terms();
        $course_query_data = Elementor_Helper::course_query($course_settings['course_per_page']);
        $column_row_count = $course_settings['course_grid_column'];
        $grid_column_divider = 12/$course_settings['course_grid_column'];
        $course_id = "";
        $course_category_color_count  = 1;
        ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class='course_category' style="text-align:<?php _e($course_settings['filter_align']); ?>">
                        <span class='category_name active' data-filter="*">All Categories</span>
                        <?php
                            foreach($course_terms as $course_term){    
                                _e("<span class='category_name' data-filter='.".$course_term->slug."'>".$course_term->name."</span>");
                            }
                        ?>
                    </div>
                </div>
            </div>
        <?php
  
        _e("<div class='row course_grid'>");
            if ( $course_query_data->have_posts() ) :
                while ( $course_query_data->have_posts() ) : $course_query_data->the_post();
                    $course_id = get_the_ID();
                    $course_meta = Elementor_Helper::course_meta_data($course_id);
                    $post_thumbnail_url = get_the_post_thumbnail_url($course_id);
                    $course_categories = get_the_terms($course_id, TUTOR_TAXONOMY);
                    $course_instructors = tutor_utils()->get_instructors_by_course($course_id);
                    $course_duration = get_tutor_course_duration_context($course_id);
                    $course_price = "Free";
                    if(array_key_exists('_tutor_course_price_type', $course_meta)){
                        if(strtolower($course_meta['_tutor_course_price_type'][0]) !="free"){
                            $course_price = Elementor_Helper::get_woocommerce_course_price($course_meta['_tutor_course_product_id'][0]);
                        }
                    }

                       
                    
                    ?>
                        <div class="col-sm-<?php echo $grid_column_divider; ?> course_card <?php
                                foreach($course_categories as $course_category){
                                    _e($course_category->slug." ");
                                }
                            ?>">
                            <div class="card" style="width: 100%; margin-bottom: 35px;">
                                <!-- Card front face start -->
                                <div class="card_front_face">
                                    <img class="course_thumbnail_image" src="<?php echo get_the_post_thumbnail_url($course_id); ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="course_category category_color_<?php _e($course_category_color_count); ?>"> 
                                            <?php
                                                $course_category_color_count += 1;
                                                if($course_category_color_count>5){
                                                    $course_category_color_count = 1;
                                                }
                                                foreach($course_categories as $index=>$course_category){
                                                    $Category_name_in_loop = $course_category->name;
                                                    if($index > 0){
                                                        $Category_name_in_loop = ", ".$Category_name_in_loop;
                                                    }
                                                    _e($Category_name_in_loop);
                                                }
                                            ?>
                                        </div>
                                        <h3 class="card-title front-title" style="text-align: <?php _e($course_settings['front_title_align']); ?>"><?php the_title(); ?></h3>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php
                                                    Elementor_Helper::get_instructor_name($course_instructors, $course_settings['front_instructor_align']);
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="row course_lesson_details">
                                            <ul class="inline-list course-feature">
                                                <li><i class="fas fa-file-excel"></i> <?php _e(tutor_utils()->get_lesson_count_by_course($course_id)." Lessons", "tutor"); ?></li>
                                                <li><i class="fas fa-briefcase"></i> Online Class</li>
                                            </ul>
                                        </div>
                                        <hr/>
                                        <div class="single_course_footer">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="course-fee price-title"><?php _e($course_price, 'tutor'); ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <?php
                                                        Elementor_Helper::get_course_rating($course_id);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                       
                                <!-- Card front face end -->

                                <!-- Card back face start -->
                                <div class="card_backend">
                                    <div class="card-body back course_back_face">
                                        <h5 class="back_course_category course_back_face">
                                            <?php
                                                foreach($course_categories as $index=>$course_category){
                                                    $Category_name_in_loop = $course_category->name;
                                                    if($index > 0){
                                                        $Category_name_in_loop = ", ".$Category_name_in_loop;
                                                    }
                                                    _e($Category_name_in_loop);
                                                }
                                            ?>
                                        </h5>
                                        <h3 class="back card-title course_back_face back_title" style="text-align: <?php _e($course_settings['back_title_align']); ?>"><?php the_title(); ?></h3>
                                        <div class="back_course_excerpt course_back_face">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 back_course_instructor course_back_face">
                                                <?php 
                                                    Elementor_Helper::get_instructor_name($course_instructors, $course_settings['back_instructor_align']);
                                                ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <?php
                                                    Elementor_Helper::get_course_rating($course_id);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <ul class="course_back_face course-feature">
                                                <li><i class="fas fa-bars"></i> <?php _e(tutor_utils()->get_lesson_count_by_course($course_id)." Lessons", "tutor"); ?></li>
                                                <li><i class="far fa-clock"></i> 
                                                    <?php
                                                        if($course_duration){
                                                            _e($course_duration, 'tutor');
                                                        }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="<?php _e(get_permalink($course_id)); ?>" class="course_details"><?php _e($course_settings['button_title'], 'tutor'); ?></a>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="course_back_face back_course_fee"><?php _e($course_price, 'tutor'); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card back face end -->


                            </div>
                        </div>                            
                    <?php
                    $column_row_count++;

                endwhile;
            else :
                _e( 'Sorry, no course found.', 'tutor' );
            endif;

            if($course_settings['enable_all_course']){
            ?>
                <div class="col-sm-<?php 
                    echo $grid_column_divider; 
                    foreach($course_terms as $course_term){
                        echo " ".$course_term->slug;
                    }
                ?>">
                    <!-- All course card -->
                    <div class="card additional-info" style="width: 100%; margin-bottom: 35px;">
                        <div class="card-body">
                            <h3 class="title all_course_des">
                                <?php
                                    _e($course_settings['all_course_description']);
                                ?>
                            </h3>   
                            <a href="<?php _e($course_settings['button-link']['url']); ?>">
                                <button type="button" class="all_course_button"><?php _e($course_settings['all_course_button_text']); ?></button>
                            </a> 
                        </div>
                    </div>

                </div>
            <?php

            }
            
         _e("</div>");
    }
    
}

new Course_Style_1();