const swiperTeamBlock = new Swiper(".block-team .team-members.swiper", {
  slidesPerView: 1,
  loop: true,
  grabCursor: true,
  autoplay: {
    delay: 3000,
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
    1440: {
      slidesPerView: 4,
    },
  },
});
