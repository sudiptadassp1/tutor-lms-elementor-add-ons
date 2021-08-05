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

});


// Slider js
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });