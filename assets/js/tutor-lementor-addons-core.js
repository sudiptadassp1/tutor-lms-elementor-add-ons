jQuery(document).ready(function(){
  jQuery('.filter_panel_button').click(function(){
      jQuery(".filter_block .filter_panel").toggleClass('filter_toggle');
  });
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

    var videosrc;

    jQuery('.video_play_button').click(function(){
        videosrc = jQuery(this).data('src');
    });

    jQuery('#single_course_video_modal').on('shown.bs.modal', function (e) {
        
    jQuery("#video").attr('src',videosrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
    })
      

    jQuery('#single_course_video_modal').on('hide.bs.modal', function (e) {
        jQuery("#video").attr('src',videosrc); 
    }) 

});
