<?php
namespace Elementor\Tutor;
use WP_Query;

class Elementor_Helper{
    public static function get_course_terms(){
        $terms = get_terms( array( 
            'taxonomy' => 'course-category',
            'parent'   => 0
        ) );
        return $terms;
    }

    public static function course_query(){
        $args = array(
            'post_type' => 'courses',
            'posts_per_page' => -1, 
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

    public static function get_instructor_name($course_instructors){
        if($course_instructors){
            foreach($course_instructors as $course_instructor){
                $instructor_profile_url = tutor_utils()->profile_url($course_instructor->ID);
                ?>
                    <a href="<?php _e($instructor_profile_url); ?>" class="instructor_profile">
                        <h4 class="instructor_name">
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
}
new Elementor_Helper();