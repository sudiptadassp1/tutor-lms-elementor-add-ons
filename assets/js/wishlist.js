jQuery(document).ready(function(){
    jQuery(document).on('click', '.tutor_addons_course-wish-list', function(e){
        e.preventDefault();
        console.log("Hello");
        var course_id = jQuery(this).attr('course-id');
        jQuery.ajax({
            url: wishlistAjax.ajaxurl,
            type: 'POST',
            data: { course_id: course_id, 'action': 'tutor_course_add_to_wishlist' },
            context: this,
            success: function (data) {
                if (data.success) {
                    if (data.data.status === 'added') {
                        jQuery(this).addClass('has-wish-listed');
                    } else {
                        jQuery(this).removeClass('has-wish-listed');
                    }
                } else {
                    window.location = data.data.redirect_to;
                }
            }
        });
    });
});