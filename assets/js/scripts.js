const bodyWrapper = document.querySelector("#body-wrapper");

//Header
const siteHeader = document.querySelector(".site-header");
const mobileBtn = document.querySelector("#menu-mobile");
const closeBtn = document.querySelector("#close-btn");
const backBtn = document.querySelector("#back-btn");
const navWrapper = document.querySelector("#nav-wrapper");
const parentMenuItems = document.querySelectorAll(
  ".main-menu .menu-item-has-children"
);
const searchBtn = document.querySelector("#search-btn");
const closeOverlay = document.querySelector("#overlay-close");
const searchOverlay = document.querySelector("#search-overlay");

//Slideshow
const coverSlider = document.querySelector(".cover-slider");
const coverSlides = document.querySelectorAll(".cover-slider .slide");

//Portfolio
const portfolioCategories = document.querySelectorAll(
  ".page-template-template-portfolio .portfolio__categories .category"
);
const projects = document.querySelectorAll(
  ".page-template-template-portfolio .project"
);
const galleryBtns = document.querySelectorAll(
  ".page-template-template-portfolio .open-gallery"
);
const galleryOverlay = document.querySelector("#gallery-slideshow");

//Sections
const sections = document.querySelectorAll(
  "body section:not(.internal-banner)"
);

initSections();

document.addEventListener("DOMContentLoaded", () => {
  eventListeners();

  //Cover Slideshow
  coverPositioning();

  if (coverSlides.length != 0) {
    initSlider();
  }
  if (coverSlider.classList.contains("autoplay")) {
    setInterval(autoplay, 6000);
  }
});

function eventListeners() {
  //Header
  if (window.screen.width < 1023) {
    mobileBtn.addEventListener("click", showMenu);
    parentMenuItems.forEach((item) => {
      item.addEventListener("click", (e) => {
        if (e.target === item) {
          showSubmenu(e);
        }
      });
    });
    closeBtn.addEventListener("click", hideMenu);
    backBtn.addEventListener("click", hideSubMenu);
  }

  searchBtn.addEventListener("click", showSearch);
  closeOverlay.addEventListener("click", closeSearch);

  //Slideshow
  window.addEventListener("resize", coverPositioning);

  if (coverSlides.length != 0) {
    coverSlides.forEach((slide) => {
      slide.addEventListener("click", (e) => turnVisible(e, slide));
    });
  }

  //Portfolio
  if (portfolioCategories) {
    portfolioCategories.forEach((category) => {
      category.addEventListener("click", (e) => filterCategories(e, category));
    });
  }

  if (galleryBtns) {
    galleryBtns.forEach((element) => {
      element.addEventListener("click", (e) => showGallery(e));
    });
  }

  document.body.addEventListener("click", (e) => {
    if (
      e.target.classList.contains("gallery-overlay-close") ||
      e.target.parentElement.classList.contains("gallery-overlay-close")
    ) {
      closeGallery();
    }
  });

  //Section Visibility
  window.addEventListener("scroll", isVisibleInViewport);
}

//Header
function showMenu() {
  mobileBtn.classList.add("open");
  navWrapper.classList.add("open");
}

function showSubmenu(e) {
  let currentItem = e.currentTarget;
  currentItem.children[1].classList.add("open");
  backBtn.style.display = "flex";
}

function hideMenu() {
  document
    .querySelectorAll(
      ".main-menu .sub-menu.open, #nav-wrapper.open, #menu-mobile.open"
    )
    .forEach((element) => {
      element.classList.remove("open");
    });
}

function hideSubMenu() {
  let allItems = document.querySelectorAll(".main-menu .sub-menu.open");
  let allItemsLength = allItems.length;

  if (allItemsLength > 0) {
    allItems[allItemsLength - 1].classList.remove("open");
  }
  if (allItemsLength == 1) {
    backBtn.style.display = "none";
  }
}

function showSearch() {
  searchOverlay.classList.add("open");
  closeOverlay.classList.add("open");
}

function closeSearch() {
  searchOverlay.classList.remove("open");
  closeOverlay.classList.remove("open");
}

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

//Portfolio
function filterCategories(e, category) {
  let catSelected = category.getAttribute("data-cat");

  portfolioCategories.forEach((element) => {
    element.classList.remove("selected");
  });
  category.classList.add("selected");

  projects.forEach((project) => {
    project.classList.remove("visible");

    if (catSelected == "0") {
      project.style.display = "flex";
      setTimeout(() => {
        project.classList.add("visible");
      }, 400);
    } else {
      let catsStr = project.getAttribute("data-cat");
      let catArray = catsStr.split("-");

      if (catArray.includes(catSelected)) {
        project.style.display = "flex";
        setTimeout(() => {
          project.classList.add("visible");
        }, 300);
      }
    }
  });

  setTimeout(() => {
    document
      .querySelectorAll(
        ".page-template-template-portfolio .project:not(.visible)"
      )
      .forEach((element) => {
        element.style.display = "none";
      });
  }, 400);
}

//Show Projects Gallery
function showGallery(e) {
  e.preventDefault();

  let photosIDs = e.target.getAttribute("data-photosids").split("-");
  let currentOverlay = document.querySelector("#gallery-overlay");
  let currentIDs = currentOverlay
    ? currentOverlay.getAttribute("data-ids")
    : "";

  if (currentIDs !== e.target.getAttribute("data-photosids")) {
    currentOverlay && currentOverlay.remove();

    let overlay = galleryOverlay.content.cloneNode(true);
    bodyWrapper.appendChild(overlay);
    document
      .querySelector("#gallery-overlay")
      .setAttribute("data-ids", e.target.getAttribute("data-photosids"));

    photosIDs.forEach(async function (element, i = 0) {
      let photo = await fetchWPAPI(element);

      let photoSlide = document.createElement("IMG");
      photoSlide.setAttribute("id", "photo-slide-" + i);
      photoSlide.setAttribute("src", photo.guid.rendered);
      photoSlide.setAttribute("style", "opacity: 0");

      document
        .querySelector("#gallery-overlay .gallery-slide__inner")
        .appendChild(photoSlide);

      let photoSelector = document.createElement("A");
      photoSelector.setAttribute("href", "#photo-slide-" + i);
      let photoSelectorIMG = document.createElement("IMG");
      photoSelectorIMG.setAttribute(
        "src",
        photo.media_details.sizes.thumbnail.source_url
      );
      photoSelector.setAttribute("style", "opacity: 0");
      photoSelector.appendChild(photoSelectorIMG);

      document
        .querySelector("#gallery-overlay .gallery-selector__inner")
        .appendChild(photoSelector);

      i++;

      stylingEvent(i, photosIDs.length);
    });
  } else {
    currentOverlay.style.display = "flex";
  }
}

async function fetchWPAPI(element) {
  let response = await fetch(
    document.location.origin + "/wp-json/wp/v2/media/" + element
  );
  let photo = await response.json();

  return photo;
}

function stylingEvent(index, slidesCount) {
  let scrollElement = document.querySelector(
    "#gallery-overlay .gallery-slide__inner"
  );

  if (slidesCount % 2 !== 0) {
    scrollElement.scrollTop =
      (scrollElement.scrollHeight - scrollElement.clientHeight) / 2;
  } else {
    let scrollLength =
      (slidesCount / 2 - 1) * (scrollElement.clientHeight * 0.8 + 37.5);
    scrollElement.scrollTop = scrollLength;
  }

  if (slidesCount === index) {
    setTimeout(() => {
      document.querySelector("#gallery-overlay .spinner").style.display =
        "none";
      let slidesLoaded = document.querySelectorAll(
        "#gallery-overlay .gallery-slide__inner img"
      );
      let selectorsLoaded = document.querySelectorAll(
        "#gallery-overlay .gallery-selector__inner a"
      );
      slidesLoaded.forEach(function (element, i = 0) {
        element.style.opacity = "1";
        selectorsLoaded[i].style.opacity = "1";
        i++;
      });
    }, 500);
  } else {
    document.querySelector("#gallery-overlay .spinner").style.display = "block";
  }
}

function closeGallery() {
  document.querySelector("#gallery-overlay").style.display = "none";
}

//Sections
function initSections() {
  sections.forEach((section) => {
    if (!section.classList.contains("cover-slider"))
      section.setAttribute("data-visibility", "hidden");
  });
}

//Check section visibility on viewport
function isVisibleInViewport() {
  sections.forEach((section) => {
    let item = section.getBoundingClientRect();
    if (
      item.top >= 0 &&
      // item.left >= 0 &&
      item.bottom <=
        (window.innerHeight || document.documentElement.clientHeight)
      // && item.right <= (window.innerWidth || document.documentElement.clientWidth)
    ) {
      section.setAttribute("data-visibility", "visible");
    }
  });
}
