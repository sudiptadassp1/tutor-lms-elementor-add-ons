jQuery(document).ready(function(){
    // init Isotope
    var col_grid = jQuery('.course_grid').isotope({
    // options
    });
    // filter items on button click
    jQuery('.course_category .category_name').on( 'click', function() {
        var filterValue = jQuery(this).attr('data-filter');
        col_grid.isotope({ filter: filterValue });
        jQuery(this).addClass('active').siblings().removeClass('active');
    });
});