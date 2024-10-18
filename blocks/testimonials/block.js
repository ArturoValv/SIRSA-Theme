const swiperPostsFormBlock = new Swiper(
  ".block-testimonials .col__inner.swiper",
  {
    slidesPerView: 1,
    loop: true,
    grabCursor: true,
    spaceBetween: 45,
    pagination: {
      el: ".block-testimonials .col__inner.swiper .swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
    breakpoints: {
      1440: {
        slidesPerView: 2,
        spaceBetween: 45,
      },
    },
  }
);
