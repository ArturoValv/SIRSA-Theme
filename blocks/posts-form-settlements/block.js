const settlements = document.querySelectorAll(
  ".block-posts-carousel__bottom .amount"
);

document.addEventListener("DOMContentLoaded", () => {
  const swiperPostsFormBlock = new Swiper(".posts-carousel__carousel.swiper", {
    slidesPerView: 1,
    loop: true,
    grabCursor: true,
    pagination: {
      el: ".posts-carousel__carousel.swiper .swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
    breakpoints: {
      1440: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
    },
  });

  settlements.forEach((item) => {
    let dataValue = item.getAttribute("data-value");
    let numberPattern = /\d+/g;
    let str = dataValue.split(numberPattern)[1];
    let value = dataValue.match(numberPattern);
    let index = 0;

    let inval = setInterval(() => {
      if (index == value) {
        clearInterval(inval);
      } else {
        index++;
        item.innerText = index + str;
      }
    }, 20);
  });
});
