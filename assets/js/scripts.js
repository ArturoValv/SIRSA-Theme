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

//Sections
const internalBanner = document.querySelector("body section.internal-banner");

document.addEventListener("DOMContentLoaded", () => {
  eventListeners();

  //Internal Banner
  internalBanner && intBannerPositioning();
});

function eventListeners() {
  //Header
  window.addEventListener("resize", () => {
    //Internal Banner
    internalBanner && setTimeout(intBannerPositioning, 400);

    //Mobile Menu
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
  });

  searchBtn.addEventListener("click", showSearch);
  closeOverlay.addEventListener("click", closeSearch);
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

//Internal Banner
function intBannerPositioning() {
  internalBanner.style.marginTop = siteHeader.clientHeight + "px";
}
