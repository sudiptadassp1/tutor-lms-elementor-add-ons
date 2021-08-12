var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    // slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".arrow-indicator-right",
      prevEl: ".arrow-indicator-left",
    },
    breakpoints: {  
      '576': {
        slidesPerView: 2,
      },
      '993': {
        slidesPerView: 3,
      },
    },
  });