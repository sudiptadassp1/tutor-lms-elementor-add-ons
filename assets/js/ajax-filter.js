function course_ajax_filter(sortby, category, instructor, price, archive_style, difficulty){
    jQuery.ajax({
        type : "post",
        url : myAjax.ajaxurl,
        data : {
            action: "course_filter", 
            sortby : sortby, 
            category : category, 
            instructor : instructor, 
            price: price,
            style: archive_style,
            difficulty: difficulty,
        },
        beforeSend: function() {
            jQuery('.ajax-loader').show();
        },
        success: function(response) {
            jQuery('.course_grid_archive').empty();
            jQuery('.course_grid_archive').append(response);  
            var total_course = jQuery('.ajax_course_count').val();
            jQuery('.course_archive.course_count').empty();
            jQuery('.course_archive.course_count').last().append("We found <b>"+total_course+"</b> courses available for you");         
        },
        complete: function(){
            jQuery('.ajax-loader').hide();
        }
     }) 
}

jQuery(document).ready(function(){
    var sortby = "";
    var category = [];
    var instructor = [];
    var price = "";
    var archive_style = jQuery('.archive_style').val();
    var difficulty = "";
    
    jQuery('.form-check-input').click(function(){
        if(jQuery(this).attr('data-var') == "sortby"){
            if(jQuery(this).is(":checked")){
                sortby = jQuery(this).attr('data-id');
            }else{
                sortby = "";
            }
            
        }else if(jQuery(this).attr('data-var') == "category"){
            if(jQuery(this).is(":checked")){
                category.push(jQuery(this).attr('data-id'));
            }else{
                for(var i= 0; i< category.length; i++){
                    if ( category[i] === jQuery(this).attr('data-id')) { 
    
                        category.splice(i, 1); 
                    }
                }
            }
        }else if(jQuery(this).attr('data-var') == "instructor"){
            if(jQuery(this).is(":checked")){
                instructor.push(jQuery(this).attr('data-id'));
            }else{
                for(var i= 0; i< instructor.length; i++){
                    if ( instructor[i] === jQuery(this).attr('data-id')) { 
    
                        instructor.splice(i, 1); 
                    }
                }
            }
        }else if(jQuery(this).attr('data-var') == "price"){
            if(jQuery(this).is(":checked")){
                price = jQuery(this).attr('data-id');
            }else{
                price = "";
            }
            
        }else if(jQuery(this).attr('data-var') == "difficulty"){
            if(jQuery(this).is(":checked")){
                difficulty = jQuery(this).attr('data-id');
            }else{
                difficulty = "";
            }
            
        }

        // console.log(sortby+"  "+category+" "+instructor);
        course_ajax_filter(sortby, category, instructor, price, archive_style, difficulty);
    });
    course_ajax_filter(sortby, category, instructor, price, archive_style, difficulty);
    
});