document.addEventListener("DOMContentLoaded", () => {
  const swiperPostsFormBlock = new Swiper(
    ".block-testimonials .col__inner.swiper",
    {
      slidesPerView: 1,
      loop: true,
      grabCursor: true,
      spaceBetween: 55,
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
          spaceBetween: 55,
        },
      },
    }
  );
});