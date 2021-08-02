<?php
    use Elementor\Tutor\Elementor_Helper;
    $course_terms = Elementor_Helper::get_course_terms();
    $users_data = Elementor_Helper::get_instructor();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 filter_block">
            <button type="button" class="btn btn-secondary btn-lg float-right filter_panel_button" >Filter <i class="fa fa-caret-down" aria-hidden="true"></i></button>
            <div class="filter_panel row filter_toggle">
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
    <hr/>
    <div class="course_block">
        <div class="row course_grid"></div>
        <div class="loader_text">Loading...</div>
    </div>
</div>
