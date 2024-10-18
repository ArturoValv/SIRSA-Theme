//Header
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
const coverSlides = document.querySelectorAll(".cover-slider .slide");

//Portfolio
const portfolioCategories = document.querySelectorAll(
  ".page-template-template-portfolio .portfolio__categories .category"
);
const projects = document.querySelectorAll(
  ".page-template-template-portfolio .project"
);

document.addEventListener("DOMContentLoaded", () => {
  eventListeners();
  if (coverSlides) {
    initSlider();
  }
});

function eventListeners() {
  //Header
  if (window.screen.width < 1023) {
    mobileBtn.addEventListener("click", showMenu);
    parentMenuItems.forEach((item) => {
      item.addEventListener("click", (e) => {
        e.preventDefault();
        showSubmenu(e);
      });
    });
    closeBtn.addEventListener("click", hideMenu);
    backBtn.addEventListener("click", hideSubMenu);
  }

  searchBtn.addEventListener("click", showSearch);
  closeOverlay.addEventListener("click", closeSearch);

  //Slideshow
  if (coverSlides) {
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
function initSlider() {
  document
    .querySelector(".cover-slider .slide[data-id='slide-0']")
    .classList.add("visible");
  document
    .querySelector(".cover-slider .slide[data-id='slide-0'] .content")
    .classList.add("visible");
}

function turnVisible(e, slide) {
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

    console.log(catSelected);

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
