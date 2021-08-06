function course_ajax_filter(sortby, tags, category, instructor, price, archive_style, course_taxonomies, course_taxonomies_tags, difficulty, ppp = 2, offset = 0, pagination = 0){
    jQuery.ajax({
        type : "post",
        url : myAjax.ajaxurl,
        data : {
            action: "course_filter", 
            sortby : sortby, 
            tags:tags,
            category : category, 
            instructor : instructor, 
            price: price,
            style: archive_style,
            course_taxonomies: course_taxonomies,
            course_taxonomies_tags: course_taxonomies_tags,
            difficulty: difficulty,
            ppp: ppp,
            offset: offset,
        },
        beforeSend: function() {
            jQuery('.ajax-loader').show();
        },
        success: function(response) {
            // console.log(ppp+" "+offset+" "+pagination);
            if(pagination == 1){
                var res_data = "";
                var res_data = res_data.concat(response);
                jQuery('.course_grid_archive').append(response);  
            }else{
                jQuery('.course_grid_archive').empty();
                jQuery('.course_grid_archive').append(response); 
            }

            
            var total_course = jQuery('.ajax_course_count').val();
            jQuery('.course_archive.course_count').empty();
            jQuery('.course_archive.course_count').last().append("We found <b>"+total_course+"</b> courses available for you");

        },
        error: function (jqXHR, exception) {
            flag = 0;
            alert(jqXHR);
        },
        complete: function(){
            jQuery('.ajax-loader').hide();
        }
     }) 
}

var ppp = 2;
var g_offset = 2;
var flag = 1;
var pagination = 1;

jQuery(document).ready(function(){
    var sortby = "";
    var category = [];
    var tags = [];
    var instructor = [];
    var price = "";
    var archive_style = jQuery('.archive_style').val();
    var course_taxonomies = jQuery('.archive_course_taxonomy').val();
    var course_taxonomies_tags = jQuery('.archive_course_taxonomy_tags').val();
    var difficulty = "";

    jQuery('.form-check-input').click(function(){
        g_offset = 2;
        console.log("F: "+g_offset);
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
        }else if(jQuery(this).attr('data-var') == "tags"){
            if(jQuery(this).is(":checked")){
                tags.push(jQuery(this).attr('data-id'));
            }else{
                for(var i= 0; i< tags.length; i++){
                    if ( tags[i] === jQuery(this).attr('data-id')) { 
    
                        tags.splice(i, 1); 
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
        course_ajax_filter(sortby, tags, category, instructor, price, archive_style, course_taxonomies, course_taxonomies_tags, difficulty);
    });

    jQuery(".load_more_btn").click(function(){
        course_ajax_filter(sortby, tags, category, instructor, price, archive_style, course_taxonomies, course_taxonomies_tags, difficulty, ppp, g_offset, pagination);
        if(flag == 1){
            g_offset += ppp;
        }
    });

    course_ajax_filter(sortby, tags, category, instructor, price, archive_style, course_taxonomies, course_taxonomies_tags, difficulty);
    
});