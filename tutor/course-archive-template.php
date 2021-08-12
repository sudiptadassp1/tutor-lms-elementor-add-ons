<?php
    use Elementor\Tutor\Elementor_Helper;
    $course_terms = Elementor_Helper::get_course_terms();
    $course_terms_tags = Elementor_Helper::get_course_terms(false, "course-tag");
    $users_data = Elementor_Helper::get_instructor();
    $get_archive_style = get_theme_mod('course_archive_template_settings');
    $course_taxonomy_category = get_query_var('course-category');
    $course_taxonomy_tags = get_query_var('course-tag');

    if(empty($get_archive_style)){
        $get_archive_style = "archive_style_1";
    }
    
?>
<div class="container">
    <input type="hidden" name="" class="archive_style" value="<?php _e($get_archive_style); ?>">
    <input type="hidden" name="" class="archive_course_taxonomy" value="<?php _e($course_taxonomy_category); ?>">
    <input type="hidden" name="" class="archive_course_taxonomy_tags" value="<?php _e($course_taxonomy_tags); ?>">
    <?php
        if(($get_archive_style == "archive_style_1") || ($get_archive_style == "archive_style_2")){
            ?>
                 <div class="row">
                    <div class="col-lg-12 filter_block">
                        <div class="row">
                            <div class="col-lg-9">
                                <span class='course_archive course_count'></span>
                            </div>
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-secondary btn-lg float-right filter_panel_button" >Filter <i class="fa fa-caret-down" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <hr/>
                        <div class="filter_panel row row-cols-sm-12 row-cols-md-6 row-cols-lg-5">
                            <div class="col">
                                <!-- Sort By -->
                                <div class="filter_panel_column">
                                    <h5>Sort By</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" data-var="sortby" name="inlineRadioOptions" data-id="DESC" id="sort_latest">
                                        <label class="form-check-label" for="inlineRadio1"> Latest</label>
                                    </div>
                                
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" data-var="sortby" name="inlineRadioOptions" data-id="ASC" id="sort_oldest">
                                        <label class="form-check-label" for="inlineRadio1"> Oldest</label>
                                    </div>
                                </div>
                            </div>
                           
                            <!-- Category -->
                            <?php
                                if(empty($course_taxonomy_category) && !empty($course_terms)){
                                    ?>
                                        <div class="col">
                                            <div class="filter_panel_column">
                                                <h5>Category</h5>
                                                <?php
                                                    foreach($course_terms as $terms){
                                                        ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-var="category" name="inlineRadioOptions" data-id="<?php _e($terms->slug) ?>" id="sort_<?php _e($terms->slug) ?>">
                                                                <label class="form-check-label" for="inlineRadio1"><?php _e($terms->name); ?></label>
                                                            </div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>

                            <!-- tags -->
                            <?php
                                if(empty($course_taxonomy_tags) && !empty($course_terms_tags)){
                                    ?>
                                        <div class="col">
                                            <div class="filter_panel_column">
                                                <h5>Tags</h5>
                                                <?php
                                                    foreach($course_terms_tags as $tags){
                                                        ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" data-var="tags" name="inlineRadioOptions" data-id="<?php _e($tags->slug) ?>" id="sort_<?php _e($tags->slug) ?>">
                                                                <label class="form-check-label" for="inlineRadio1"><?php _e($tags->name); ?></label>
                                                            </div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
                            
                            <div class="col">
                                <!-- Instructor -->
                                <div class="filter_panel_column">
                                    <h5>Instructor</h5>
                                    <?php
                                        foreach($users_data as $instructor){
                                            $instructor_metadata = get_user_meta($instructor->id);
                                            ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" data-var="instructor" name="inlineRadioOptions" data-id="<?php _e($instructor->id) ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?php _e($instructor_metadata['first_name'][0]." ".$instructor_metadata['last_name'][0]); ?></label>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <!-- <div class="col">
                                <!-- Price -->
                                <!-- <div class="filter_panel_column">
                                    <h5>Price</h5>  
                                    <div class="form-check">
                                        <input class="form-check-input"  type="radio" name="price_option" data-var="price" data-id="">
                                        <label class="form-check-label" for="inlineRadio1"> All</label>
                                    </div>                          
                                    <div class="form-check">
                                        <input class="form-check-input"  type="radio" name="price_option" data-var="price" data-id="free">
                                        <label class="form-check-label" for="inlineRadio1"> Free</label>
                                    </div>
                                
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="price_option" data-var="price" data-id="paid">
                                        <label class="form-check-label" for="inlineRadio1"> Paid</label>
                                    </div>
                                </div>
                            </div> --> 

                            <div class="col">
                                <!-- Difficulty -->
                                <div class="filter_panel_column">
                                    <h5>Difficulty Level</h5>  
                                    <div class="form-check">
                                        <input class="form-check-input"  type="radio" name="difficulty" data-var="difficulty" data-id="">
                                        <label class="form-check-label" for="inlineRadio1"> All Levels</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"  type="radio" name="difficulty" data-var="difficulty" data-id="beginner">
                                        <label class="form-check-label" for="inlineRadio1"> Beginner</label>
                                    </div>                          
                                    <div class="form-check">
                                        <input class="form-check-input"  type="radio" name="difficulty" data-var="difficulty" data-id="intermediate">
                                        <label class="form-check-label" for="inlineRadio1"> Intermediate</label>
                                    </div>
                                
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="difficulty" data-var="difficulty" data-id="expert">
                                        <label class="form-check-label" for="inlineRadio1"> Expert</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="archive course_block">
                        <div class="row course_grid_archive"></div>
                        <div class="row load_more_button justify-content-center">
                            <button class="load_more_btn">Load More</button>
                        </div>
                    </div>
                </div>
            <?php
        }else{
            ?>
                <div class="archive_style_3_and_4">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="row">
                                <span class='course_archive course_count'></span>
                            </div>
                            <div class="row">
                                <div class="archive course_block">
                                    <div class="row course_grid_archive"></div>
                                    <div class="row load_more_button justify-content-center">
                                        <button class="load_more_btn">Load More</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <!-- Sort By -->
                            <div class="row">
                                <div class="card course_side_filter">
                                    <div class="card-body">
                                        <div class="filter_panel_column">
                                            <h5>Sort By</h5>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" data-var="sortby" name="inlineRadioOptions" data-id="DESC" id="sort_latest">
                                                <label class="form-check-label" for="inlineRadio1"> Latest</label>
                                            </div>
                                        
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" data-var="sortby" name="inlineRadioOptions" data-id="ASC" id="sort_oldest">
                                                <label class="form-check-label" for="inlineRadio1"> Oldest</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- By Category -->
                            <div class="row">
                                <div class="card course_side_filter">
                                    <div class="card-body">
                                        <div class="filter_panel_column">
                                            <h5>Category</h5>
                                            <?php
                                                foreach($course_terms as $terms){
                                                    ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" data-var="category" name="inlineRadioOptions" data-id="<?php _e($terms->slug) ?>" id="sort_<?php _e($terms->slug) ?>">
                                                            <label class="form-check-label" for="inlineRadio1"><?php _e($terms->name); ?></label>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- By Instructor  -->
                            <div class="row">
                                <div class="card course_side_filter">
                                    <div class="card-body">
                                        <div class="filter_panel_column">
                                            <h5>Instructor</h5>
                                            <?php
                                            foreach($users_data as $instructor){
                                                $instructor_metadata = get_user_meta($instructor->id);
                                                ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" data-var="instructor" name="inlineRadioOptions" data-id="<?php _e($instructor->id) ?>">
                                                        <label class="form-check-label" for="inlineRadio1"><?php _e($instructor_metadata['first_name'][0]." ".$instructor_metadata['last_name'][0]); ?></label>
                                                    </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- By Price -->
                            <div class="row">
                                <div class="card course_side_filter">
                                    <div class="card-body">
                                        <div class="filter_panel_column">
                                            <h5>Price</h5>  
                                            <div class="form-check">
                                                <input class="form-check-input"  type="radio" name="price_option" data-var="price" data-id="">
                                                <label class="form-check-label" for="inlineRadio1"> All</label>
                                            </div>                          
                                            <div class="form-check">
                                                <input class="form-check-input"  type="radio" name="price_option" data-var="price" data-id="free">
                                                <label class="form-check-label" for="inlineRadio1"> Free</label>
                                            </div>
                                        
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="price_option" data-var="price" data-id="paid">
                                                <label class="form-check-label" for="inlineRadio1"> Paid</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- By Experties -->
                            <div class="row">
                                <div class="card course_side_filter">
                                    <div class="card-body">
                                        <div class="filter_panel_column">
                                            <h5>Difficulty Level</h5>  
                                            <div class="form-check">
                                                <input class="form-check-input"  type="radio" name="difficulty" data-var="difficulty" data-id="">
                                                <label class="form-check-label" for="inlineRadio1"> All Levels</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input"  type="radio" name="difficulty" data-var="difficulty" data-id="beginner">
                                                <label class="form-check-label" for="inlineRadio1"> Beginner</label>
                                            </div>                          
                                            <div class="form-check">
                                                <input class="form-check-input"  type="radio" name="difficulty" data-var="difficulty" data-id="intermediate">
                                                <label class="form-check-label" for="inlineRadio1"> Intermediate</label>
                                            </div>
                                        
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="difficulty" data-var="difficulty" data-id="expert">
                                                <label class="form-check-label" for="inlineRadio1"> Expert</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
    
</div>

<?php
    function ajax_loader_footer(){
        ?>
            <div class="container-fluid archive_block_full_page">
                <div class="ajax-loader">
                    <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ).'assets/media/loader.gif'; ?>" class="img-responsive" />
                </div>
            </div>
        <?php
    } 
    add_action( 'wp_footer', 'ajax_loader_footer' );
?>

               
 
                                    