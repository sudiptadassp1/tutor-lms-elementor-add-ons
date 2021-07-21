<?php
namespace Elementor\Tutor\widgets;
use Elementor\Tutor\Elementor_Helper;

class Testimonials_Style{
    public function testimonials_style($settings){
        // print_r($settings);
        ?>
        <div class="row">
            <div class="arrow-icons">
                <button class="arrow-indicator-left">
                    <i class="fas fa-chevron-left fa-2x"></i>
                </button>
                <button class="arrow-indicator-right">
                    <i class="fas fa-chevron-right fa-2x"></i>
                </button>
            </div>
        </div>
            <div class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                    <?php
                        if($settings['testimonial-list']){
                            foreach($settings['testimonial-list'] as $items){
                                ?>
                                <div class="swiper-slide" data-slick-index="1" aria-hidden="true" style="width: 493px;" tabindex="-1">
                                    <div class="testimonial-box style-1" style="width: 100%; display: inline-block;">
                                        <div class="icon-box">
                                            <i class="fa fa-quote-left fa-lg" aria-hidden="true"></i>
                                        </div>
                                        <p class="description">
                                            <?php _e($items['testimonial_comment']); ?>
                                        </p>
                                        <div class="customer-info">
                                            <div class="figure-box">
                                                <img src="<?php _e($items['image']['url']); ?>" alt="Testimonial" width="60" height="60">
                                            </div>
                                            <div class="content-box">
                                                <h3 class="title"><?php _e($items['testimonial_title']); ?></h3>
                                                <p class="designation"><?php _e($items['testimonial_designation']); ?></p>
                                            </div>
                                        </div>
                                        <ul class="testimonial-rating inline-list">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        <?php
    }    
}

