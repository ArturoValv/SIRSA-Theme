//Slideshow
const coverSlider = document.querySelector(".cover-slider");
const coverSlides = document.querySelectorAll(".cover-slider .slide");
let autoplayInterval;
//Sections
const sections = document.querySelectorAll(
  "body.page-template-template-homepage section:not(.cover-slider), body .site-footer"
);

document.addEventListener("DOMContentLoaded", () => {
  initSections();
  isVisibleInViewport();

  //Cover Slideshow
  if (coverSlider) {
    coverPositioning();
    startAutoplay();
  }

  if (coverSlides.length != 0) {
    initSlider();
  }

  if (coverSlider.classList.contains("autoplay")) {
    coverSlider.addEventListener("mouseover", stopAutoplay);
    coverSlider.addEventListener("mouseout", startAutoplay);
  }

  window.addEventListener("resize", () => setTimeout(coverPositioning, 400));

  if (coverSlides.length != 0) {
    coverSlides.forEach((slide) => {
      slide.addEventListener("click", (e) => turnVisible(e, slide));
    });
  }
});

window.addEventListener("load", () => {
  //Section Visibility
  window.addEventListener("scroll", isVisibleInViewport);
});

//Slideshow
function coverPositioning() {
  coverSlider.style.marginTop = siteHeader.clientHeight + "px";
  coverSlider.style.height =
    window.innerHeight - siteHeader.clientHeight + "px";
}

function initSlider() {
  document
    .querySelector(".cover-slider .slide[data-id='slide-0']")
    .classList.add("visible");
  document
    .querySelector(".cover-slider .slide[data-id='slide-0'] .content")
    .classList.add("visible");
}

function turnVisible(e, slide) {
  if (slide.children[1] == e.target) {
    let currentDataId = slide.getAttribute("data-id");
    let str = currentDataId.split("-");
    let nextDataId = Number(str[1]) + 1;

    slide.classList.remove("visible");
    slide.querySelector(".content").classList.remove("visible");

    if (nextDataId !== coverSlides.length) {
      coverSlides[nextDataId].classList.add("visible");
      coverSlides[nextDataId]
        .querySelector(".content")
        .classList.add("visible");
    } else {
      coverSlides[0].classList.add("visible");
      coverSlides[0].querySelector(".content").classList.add("visible");
    }
  }
}

function startAutoplay() {
  if (!autoplayInterval) {
    autoplayInterval = setInterval(autoplay, 6000);
  }
}

function autoplay() {
  let slide = document.querySelector(".cover-slider .slide.visible");
  let currentDataId = slide.getAttribute("data-id");
  let str = currentDataId.split("-");
  let nextDataId = Number(str[1]) + 1;

  slide.classList.remove("visible");
  slide.querySelector(".content").classList.remove("visible");

  if (nextDataId !== coverSlides.length) {
    coverSlides[nextDataId].classList.add("visible");
    coverSlides[nextDataId].querySelector(".content").classList.add("visible");
  } else {
    coverSlides[0].classList.add("visible");
    coverSlides[0].querySelector(".content").classList.add("visible");
  }
}

function stopAutoplay() {
  clearInterval(autoplayInterval);
  autoplayInterval = null;
}

//Sections
function initSections() {
  sections.forEach((section) => {
    section.setAttribute("data-visibility", "hidden");
  });
}

//Check section visibility on viewport
function isVisibleInViewport() {
  sections.forEach((section) => {
    let item = section.offsetTop;

    if (
      window.scrollY >=
      item - siteHeader.clientHeight
      // &&
      //item.bottom <= (window.innerHeight || document.clientHeight)
      //&& item.left >= 0 &&
      //item.right <= (window.innerWidth || document.documentElement.clientWidth)
    ) {
      section.setAttribute("data-visibility", "visible");
    }
  });
}
