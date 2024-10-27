document.addEventListener("DOMContentLoaded", () => {
  const swiperPostsCarousel = new Swiper(
    ".block-posts-carousel__inner.swiper",
    {
      slidesPerView: 1,
      loop: true,
      grabCursor: true,
      navigation: {
        nextEl: ".block-posts-carousel__inner.swiper .swiper-button-next",
        prevEl: ".block-posts-carousel__inner.swiper .swiper-button-prev",
      },
      autoplay: {
        delay: 3000,
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1440: {
          slidesPerView: 3,
        },
      },
    }
  );
});
