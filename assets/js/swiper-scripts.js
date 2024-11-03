document.addEventListener("DOMContentLoaded", () => {
  const galleryProjectCarousel = new Swiper(".gallery-slider.swiper", {
    slidesPerView: 1,
    loop: true,
    grabCursor: true,
    navigation: {
      nextEl: ".gallery-slider.swiper .swiper-button-next",
      prevEl: ".gallery-slider.swiper .swiper-button-prev",
    },
    autoplay: {
      delay: 3000,
    },
    breakpoints: {
      1440: {
        slidesPerView: 2,
      },
    },
  });
});
