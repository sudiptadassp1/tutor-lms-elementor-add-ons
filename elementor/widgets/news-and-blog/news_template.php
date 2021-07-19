<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\Elementor_Helper;

class News_Template{
    public function news_template($settings){
        $post_object = Elementor_Helper::get_post_by_post_type($settings['post-type']);
        $flag = 0;
        ?>
            <div class="row">
                <?php
                    if($post_object->have_posts()) :
                        while($post_object->have_posts()) : $post_object->the_post();
                        $post_id = get_the_ID();
                        $post_categories = get_the_terms($post_id, 'category');
                        if($flag != 2 ){
                            if($flag == 0 || $flag == 3){ _e("<div class='col-lg-3 col-md-12 col-sm-12'>"); }
                            ?>
                                <div class='col-lg-12 col-md-12 col-sm-12 blog_card wow fadeInLeft animated animated' data-wow-duration="1s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s;">
                                    <div class="blog-box style-1">
                                        <div class="figure-box">
                                            <a href="">
                                                <img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" alt="Blog" width="545" height="484">
                                            </a>
                                        </div>
                                        <div class="content-box">
                                            <a href="<?php //_e(get_term_link($post_id)); ?>" class="category-name">
                                                <?php 
                                                    foreach($post_categories as $index=>$post_categorie){
                                                        $post_name_in_loop = $post_categorie->name;
                                                        if($index > 0){
                                                            $post_name_in_loop = ", ".$post_name_in_loop;
                                                        }
                                                        _e($post_name_in_loop);
                                                    }
                                                ?>
                                            </a>
                                            <h3 class="title">
                                                <a href="<?php _e(get_permalink()); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <ul class="entry-meta inline-list">
                                                <li><i class="fas fa-calendar-alt"></i> <?php _e(get_the_date('F j, Y', $post_id)); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            if($flag == 1 || $flag == 4){ _e("</div>"); }
                        }else if($flag == 2){
                            ?>
                                <div class='col-lg-6 col-md-12 col-sm-12 middle_card_box'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 second blog_card wow fadeInUp animated animated" data-wow-duration="1s" data-wow-delay="0.4s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.4s;">
                                        <div class="blog-box style-2">
                                            <div class="figure-box">
                                                <a href="">
                                                    <img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" alt="Blog" width="930" height="930">
                                                </a>
                                            </div>
                                            <div class="content-box">
                                                <a href="" class="category-name">
                                                    <?php 
                                                        foreach($post_categories as $index=>$post_categorie){
                                                            $post_name_in_loop = $post_categorie->name;
                                                            if($index > 0){
                                                                $post_name_in_loop = ", ".$post_name_in_loop;
                                                            }
                                                            _e($post_name_in_loop);
                                                        }
                                                    ?>
                                                </a>
                                            <h3 class="title">
                                                <a href=""><?php the_title(); ?></a>
                                            </h3>
                                            <ul class="entry-meta inline-list">
                                                <li><i class="fas fa-calendar-alt"></i> <?php _e(get_the_date('F j, Y', $post_id)); ?></li>
                                            </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                        $flag++;
                        endwhile;
                    else:
                        _e('Oops, there are no posts.', 'tutor');
                    endif;
                ?>
            </div>
            <div class="view_all_button" style="text-align:<?php _e($settings['button_align']); ?>">
                    <a href="<?php _e($settings['button_link']['url']); ?>" class="view_all_post_btn"><?php _e($settings['button_text']); ?></a>
                </div>
        <?php
    }    
}

