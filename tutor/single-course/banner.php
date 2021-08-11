<?php
global $post; 
function the_breadcrumb() {
    if (!is_home()) {
        echo '<a href="';
        echo get_option('home');
        echo '">Home / ';
        echo "</a>";
        if (is_category() || is_single()) {
            the_category('title_li=');
            if (is_single()) {
                echo "<a href='".get_post_type_archive_link(get_post_type())."'>".get_post_type()." / </a>";
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
    }
}

function single_banner_text_block(){
    ?>
        <div class="col-lg-7 d-flex align-items-center">
            <div class="content-box">
                <div class="category-name">
                    <?php
                    $course_categories = get_tutor_course_categories();
                    if(is_array($course_categories) && count($course_categories)){
                        foreach ($course_categories as $index => $course_category){
                            $category_name = $course_category->name;
                            if($index > 0){
                                $category_name = ", ".$category_name;
                            }
                            _e($category_name);
                        }
                    }
                    ?>
                </div>
                <h1 class="title">
                <?php
                    the_title();
                ?>
                </h1>
                <p class="description">
                <?php
                    the_excerpt();
                ?>
                </p>
                <ul class="inline-list list-info single_course_meta_box">
                <li>
                    <?php 
                        echo tutor_utils()->get_tutor_avatar($post->post_author); 
                        echo get_the_author();
                    ?>
                </li>
                <li>
                    <?php
                        $course_rating = tutor_utils()->get_course_rating();
                        tutor_utils()->star_rating_generator($course_rating->rating_avg);
                        echo ' ('.$course_rating->rating_count.')';
                    ?>
                </li>
                <li>
                    <?php echo (int) tutor_utils()->count_enrolled_users_by_course(); ?>
                        enrolled students
                </li>
                </ul>
            </div>
        </div>
    <?php
}

function single_banner_video_block(){
    ?>
        <div class="col-lg-5 text-center">
            <div class="figure-box">
            <?php 
                get_tutor_course_thumbnail(); 
                $video_info = tutor_utils()->get_video_info();
                $vimeo_video_id = tutor_utils()->get_vimeo_video_id(tutor_utils()->avalue_dot('source_vimeo', $video_info));
                $youtube_video_id = tutor_utils()->get_youtube_video_id(tutor_utils()->avalue_dot('source_youtube', $video_info));
                if(empty($vimeo_video_id)){
                    if(!empty($youtube_video_id)){
                        $video_id = 'https://www.youtube.com/embed/'.$youtube_video_id;
                    }
                }else{
                    $video_id = 'https://player.vimeo.com/video/'.$vimeo_video_id;
                }
            ?>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary video_play_button" data-bs-toggle="modal" data-bs-target="#single_course_video_modal" data-src="<?php _e($video_id); ?>">
                    <i class="fas fa-play"></i>
                </button>
            </div>
        </div>
    <?php
}



if(!function_exists("tutor_addons_single_banner")){
    function tutor_addons_single_banner($echo = true){
        $single_course_style = get_theme_mod('single_course_template_settings');
        if(empty($single_course_style)){
            $single_course_style = "single_style_1";
        }
        ?>
            <div class="single-colurse-banner container-fluid banner-info-style-1 <?php
                if($single_course_style == "single_style_1"){
                    _e("single_banner_style_1");
                }else if($single_course_style == "single_style_2"){
                    _e("single_banner_style_2");
                }else{
                    _e("single_banner_style_3");
                }
            ?>">
                <div class="single_course_breadcrum">
                    <?php
                        the_breadcrumb();
                    ?>
                </div>
                <div class="container">
                    <div class="row">
                        <?php
                        if($single_course_style == "single_style_3"){
                            single_banner_video_block();
                            single_banner_text_block();
                        }else{
                            single_banner_text_block();
                            single_banner_video_block();
                        }
                        ?>              
                    </div>

                    <!-- Modal -->
                    <div class="modal fade " id="single_course_video_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
?>



