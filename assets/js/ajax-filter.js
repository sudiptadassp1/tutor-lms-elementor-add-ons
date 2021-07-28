jQuery(document).ready(function(){
    var sortby = "";
    var category = [];
    var instructor = [];
    var hidden_course_per_page = jQuery(".hidden_course_per_page").val();
    var hidden_course_grid_column = jQuery(".hidden_course_grid_column").val();
    var hidden_front_title_align = jQuery(".hidden_front_title_align").val();
    var hidden_front_instructor_align = jQuery(".hidden_front_instructor_align").val();
    var hidden_back_title_align = jQuery(".hidden_back_title_align").val();
    var hidden_back_instructor_align = jQuery(".hidden_back_instructor_align").val();
    var hidden_button_title = jQuery(".hidden_button_title").val();

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

        jQuery.ajax({
            type : "post",
            url : myAjax.ajaxurl,
            data : {
                action: "course_filter", 
                sortby : sortby, 
                category : category, 
                instructor : instructor, 
                course_per_page : hidden_course_per_page, 
                course_grid_column : hidden_course_grid_column, 
                front_title_align : hidden_front_title_align, 
                front_instructor_align : hidden_front_instructor_align, 
                back_title_align : hidden_back_title_align, 
                back_instructor_align : hidden_back_instructor_align, 
                button_title : hidden_button_title, 
            },
            success: function(response) {
               jQuery('.course_grid').empty();
               jQuery('.course_grid').append(response);
            }
         }) 
        
    });
    
});