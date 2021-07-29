<?php
namespace Elementor\Tutor;
use WP_Query;

class Elementor_Helper{
    public function __construct(){
        add_action("wp_ajax_course_filter", array( $this, 'ajax_course_filter' ));
        add_action("wp_ajax_nopriv_course_filter", array( $this, 'ajax_course_filter_nopriv' ));
    }
    public static function get_course_terms($empty = true){
        $terms = get_terms( array( 
            'taxonomy' => 'course-category',
            'parent'   => 0,
            'hide_empty' => $empty,
        ) );
        return $terms;
    }

    public static function course_query($per_page){
        $args = array(
            'post_type' => 'courses',
            'posts_per_page' => $per_page, 
        );
        $query = new WP_Query( $args );
        
        return $query;
    }


    public static function course_query_for_archive($per_page){
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'courses',
            'posts_per_page' => $per_page, 
            'paged' => $paged,
            'orderby' => 'date',
            'order'   => 'ASC',
        );
        $query = new WP_Query( $args );
        
        return $query;
    }


    public static function course_meta_data($course_id){
        return get_post_meta($course_id);
    }

    public static function get_woocommerce_course_price($product_id){
        $product = wc_get_product( $product_id );

        $course_price = get_woocommerce_currency_symbol();
        $course_price .= $product->get_price();
        return $course_price;
    }

    public static function get_instructor_name($course_instructors, $alignment="left"){
        if($course_instructors){
            foreach($course_instructors as $course_instructor){
                $instructor_profile_url = tutor_utils()->profile_url($course_instructor->ID);
                ?>
                    <a href="<?php _e($instructor_profile_url); ?>" class="instructor_profile">
                        <h4 class="instructor_name instructor-title" style="text-align: <?php _e($alignment);?>">
                            <?php _e($course_instructor->display_name); ?>
                        </h4>
                    </a>
                <?php
            }
        }else{
            _e("<h4 class='instructor_name text-warning'>No Instructor</h4>", "tutor");
        }
    }

    public static function get_course_rating($course_id){
        ?>
            <span class="tutor-single-course-rating">
                <?php
                $course_rating = tutor_utils()->get_course_rating($course_id);
                tutor_utils()->star_rating_generator($course_rating->rating_avg);
                ?>
                <span class="tutor-single-rating-count">
                    <?php
                        _e('<i>('.$course_rating->rating_count.')</i>');
                    ?>
                </span>
            </span>
        <?php
    }

    public static function get_course_terms_filter($term_id){
        $terms_filter = get_term_by('id', $term_id, 'course-category');
        return $terms_filter;
    } 

    public function get_all_post_types(){
        $get_post_type = array();
        $args = array(
            'public'   => true
        );
        $post_output = 'objects';
        $all_post_types = get_post_types( $args, $output );

        foreach($all_post_types as $post_types){
            $get_post_type[$post_types->name] = $post_types->label;
        }
        return $get_post_type;
    }

    public static function get_post_by_post_type($post_type){
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => 5, 
        );

        return new WP_Query( $args );
    }

    public static function get_instructor(){
        $args = array(
            'role' => "tutor_instructor",
        );
        
        $instructor_data = get_users($args);
        return $instructor_data;
    }

    public function ajax_course_filter(){
        $sort_by = $_POST["sortby"];
        $category = $_POST["category"];
        $instructor = $_POST["instructor"];

        if(!empty($category)){
            $args = array(
                'post_type' => 'courses',
                'posts_per_page' => -1, 
                'orderby' => 'date',
                'order'   => $sort_by,
                'author__in' => $instructor,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'course-category',
                        'field'    => 'slug',
                        'terms'    => $category,
                    ),
                ),            
            );
        }else{
            $args = array(
                'post_type' => 'courses',
                'posts_per_page' => -1, 
                'orderby' => 'date',
                'order'   => $sort_by,
                'author__in' => $instructor,            
            );
        }
        
        
        $course_query_data = new WP_Query( $args );
        
        $course_category_color_count  = 1;
        $users_data = self::get_instructor();
        $course_id = "";
        $course_terms = self::get_course_terms();
        $course_count = $course_query_data->found_posts;

        _e("<span class='course_count'>We found <b>".$course_count."</b> courses available for you</span>");
        if ( $course_query_data->have_posts() ) :
            while ( $course_query_data->have_posts() ) : $course_query_data->the_post();
                $course_id = get_the_ID();
                $course_meta = self::course_meta_data($course_id);
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
                    <div class="col-sm-4 course_card <?php
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
                                    <h3 class="card-title front-title"><?php the_title(); ?></h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <?php
                                                self::get_instructor_name($course_instructors, "left");
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
                                                    self::get_course_rating($course_id);
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
                                    <h3 class="back card-title course_back_face back_title"><?php the_title(); ?></h3>
                                    <div class="back_course_excerpt course_back_face">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 back_course_instructor course_back_face">
                                            <?php 
                                                self::get_instructor_name($course_instructors, "left");
                                            ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php
                                                self::get_course_rating($course_id);
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
                                            <a href="<?php _e(get_permalink($course_id)); ?>" class="course_details">Details</a>
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


        die();
    }

    public function ajax_course_filter_nopriv(){
        echo "No priview";
        die();
    }


}
