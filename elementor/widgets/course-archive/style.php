<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\Elementor_Helper;

class Course_Archive_Style{
    public function course_archive($course_settings){
        require_once(TUTOR_BASE_DIR.'elementor/helper.php');
        $course_terms = Elementor_Helper::get_course_terms();
        $course_query_data = Elementor_Helper::course_query_for_archive($course_settings['course_per_page']);
        $column_row_count = $course_settings['course_grid_column'];
        $grid_column_divider = 12/$course_settings['course_grid_column'];
        $course_id = "";
        $course_category_color_count  = 1;
        $users_data = Elementor_Helper::get_instructor();
        ?>
            <div class="row">
                <div class="col-lg-12 filter_block">
                    <button type="button" class="btn btn-secondary btn-lg float-right filter_panel_button" >Filter <i class="fa fa-caret-down" aria-hidden="true"></i></button>
                    <div class="filter_panel row filter_toggle">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <!-- Sort By -->
                            <div class="filter_panel_column">
                                <h5>Sort By</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="sort_latest">
                                    <label class="form-check-label" for="inlineRadio1"> Latest</label>
                                </div>
                            
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="sort_oldest">
                                    <label class="form-check-label" for="inlineRadio1"> Oldest</label>
                                </div>
                            
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="sort_course_title_asec">
                                    <label class="form-check-label" for="inlineRadio1"> Course Title (a-z)</label>
                                </div>
                            
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="sort_course_title_desc">
                                    <label class="form-check-label" for="inlineRadio1"> Course Title (z-a)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <!-- Category -->
                            <div class="filter_panel_column">
                                <h5>Category</h5>
                                <?php
                                    foreach($course_terms as $terms){
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="sort_<?php _e($terms->slug) ?>">
                                                <label class="form-check-label" for="inlineRadio1"><?php _e($terms->name); ?></label>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <!-- Instructor -->
                            <div class="filter_panel_column">
                                <h5>Instructor</h5>
                                <?php
                                    foreach($users_data as $instructor){
                                        $instructor_metadata = get_user_meta($instructor->id);
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="inlineRadioOptions">
                                                <label class="form-check-label" for="inlineRadio1"><?php _e($instructor_metadata['first_name'][0]." ".$instructor_metadata['last_name'][0]); ?></label>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <!-- Price -->
                            <div class="filter_panel_column">
                                <h5>Price</h5>                            
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="free_price">
                                    <label class="form-check-label" for="inlineRadio1"> Free</label>
                                </div>
                            
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="paid_price">
                                    <label class="form-check-label" for="inlineRadio1"> Paid</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
  
        _e("<hr/><div class='row course_grid'>");
            if ( $course_query_data->have_posts() ) :
                while ( $course_query_data->have_posts() ) : $course_query_data->the_post();
                    $course_id = get_the_ID();
                    $course_meta = Elementor_Helper::course_meta_data($course_id);
                    $post_thumbnail_url = get_the_post_thumbnail_url($course_id);
                    $course_categories = get_the_terms($course_id, TUTOR_TAXONOMY);
                    $course_instructors = tutor_utils()->get_instructors_by_course($course_id);
                    $course_duration = get_tutor_course_duration_context($course_id);

                    if(strtolower($course_meta['_tutor_course_price_type'][0])=="free"){
                        $course_price = "Free";
                        $courses_price_class = "free_course";
                    }else{
                        $course_price = Elementor_Helper::get_woocommerce_course_price($course_meta['_tutor_course_product_id'][0]);
                        $courses_price_class = "paid_course";
                    }   
                    
                    ?>
                        <div class="col-sm-<?php echo $grid_column_divider; ?> course_card <?php
                                foreach($course_categories as $course_category){
                                    _e($course_category->slug." ");
                                }
                                _e($courses_price_class);
                            ?> ">
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

         _e("</div>");
           
            ?>
                <nav class="course_archive_pagination">
                    <ul>
                        <li><?php previous_posts_link( '&laquo; PREV', $course_query_data->max_num_pages) ?></li> 
                        <li><?php next_posts_link( 'NEXT &raquo;', $course_query_data->max_num_pages) ?></li>
                    </ul>
                </nav>
            <?php
            wp_reset_query();
    }    
}

