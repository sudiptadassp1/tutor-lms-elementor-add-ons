function course_ajax_filter(sortby, category, instructor){
    jQuery.ajax({
        type : "post",
        url : myAjax.ajaxurl,
        data : {
            action: "course_filter", 
            sortby : sortby, 
            category : category, 
            instructor : instructor, 
        },
        beforeSend: function() {
            jQuery("course_block").html("<div class='loader_text'>Loading...</div>");
        },
        success: function(response) {
           jQuery('.course_grid').empty();
           jQuery('.course_grid').append(response);
        },
        complete: function(){
            jQuery(".course_block .loader_text").remove();
        }
     }) 
}

jQuery(document).ready(function(){
    var sortby = "";
    var category = [];
    var instructor = [];
    
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
        }

        // console.log(sortby+"  "+category+" "+instructor);
        course_ajax_filter(sortby, category, instructor);
    });
    course_ajax_filter(sortby, category, instructor);
    
});