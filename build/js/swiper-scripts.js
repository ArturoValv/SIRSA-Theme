document.addEventListener("DOMContentLoaded",()=>{new Swiper(".gallery-slider.swiper",{slidesPerView:1,loop:!0,grabCursor:!0,navigation:{nextEl:".gallery-slider.swiper .swiper-button-next",prevEl:".gallery-slider.swiper .swiper-button-prev"},autoplay:{delay:3e3},breakpoints:{1440:{slidesPerView:2}}})});