<?php
namespace Elementor\Tutor\widgets;


class Course_Banner_style{
    public static function course_banner($course_settings){
        $disable_default_player_vimeo = tutor_utils()->get_option('disable_default_player_vimeo');
        $disable_default_player_youtube = tutor_utils()->get_option('disable_default_player_youtube');
        $video_info = tutor_utils()->get_video_info();
        $video_id_vimeo = tutor_utils()->get_vimeo_video_id(tutor_utils()->avalue_dot('source_vimeo', $video_info));  
        $youtube_video_id = tutor_utils()->get_youtube_video_id(tutor_utils()->avalue_dot('source_youtube', $video_info));  
        
        $course_id = get_the_ID();
        $course_post_type = tutor()->course_post_type;
        $queryCourse = new WP_Query(array('p' => $course_id, 'post_type' => $course_post_type));

        
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 single_course_banner">
                        <?php
                            if ($disable_default_player_youtube && $disable_default_player_vimeo){
                                ?>
                                <div class="course-video-embeded-wrap">
                                    <iframe src="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>" frameborder="0" allowfullscreen allowtransparency allow="autoplay"></iframe>
                                </div>
                                <?php
                            }else if(!empty($youtube_video_id)){
                                ?>
                                <div class="plyr__video-embed" id="course_video_player">
                                    <iframe src="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>?&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                                </div>
                            <?php }else{
                                ?>
                                    <div class="plyr__video-embed" id="course_video_player">
                                        <iframe src="https://player.vimeo.com/video/<?php echo $video_id_vimeo; ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay"></iframe>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    
                    <div class="col-lg-7 single_course_banner">
                        <?php
                            if ($queryCourse->have_posts()){
                                while ($queryCourse->have_posts()){
                                    $queryCourse->the_post();
                                    
                                }
                                wp_reset_postdata();
                            }
                        ?>
                    </div>
                </div>
            </div>
        <?php
    }
    
}

new Course_Banner_style();