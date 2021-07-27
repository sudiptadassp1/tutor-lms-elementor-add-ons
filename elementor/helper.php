<?php
namespace Elementor\Tutor;
use WP_Query;

class Elementor_Helper{
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
            'paged' => $paged
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


}
