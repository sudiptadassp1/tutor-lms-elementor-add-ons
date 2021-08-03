<?php
    use Elementor\Tutor\Elementor_Helper;
    $course_terms = Elementor_Helper::get_course_terms();
    $users_data = Elementor_Helper::get_instructor();
    $get_archive_style = get_theme_mod('course_archive_template_settings');
?>
<div class="container">
    <input type="hidden" name="" class="archive_style" value="<?php _e($get_archive_style); ?>">
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
                        <div class="filter_panel row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
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
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <!-- Category -->
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
                            <div class="col-lg-3 col-md-6 col-sm-12">
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
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <!-- Price -->
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
                </div>

                <div class="row">
                    <div class="archive course_block">
                        <div class="row course_grid_archive"></div>
                        <div class="ajax-loader">
                            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ).'assets/media/loader.gif'; ?>" class="img-responsive" />
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
                                    <div class="ajax-loader">
                                        <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ).'assets/media/loader.gif'; ?>" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">ajfhvbdjvjdf</div>
                    </div>
                </div>
            <?php
        }
    ?>
    
</div>
