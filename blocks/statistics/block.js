const amounts = document.querySelectorAll(".block-statistics .amount .value");

const graphics = document.querySelectorAll(".block-statistics .graphics .bar");

document.addEventListener("scroll", () => {
  let block = document.querySelector(".block-statistics");

  let sectionVisibility = block.checkVisibility({
    opacityProperty: true,
    visibilityProperty: true,
  });

  if (sectionVisibility && !block.classList.contains("visible")) {
    block.classList.add("visible");
    graphics.forEach((item) => {
      let value = item.getAttribute("data-value");
      let index = 0;
      let invalValue = value / 10;

      let inval = setInterval(() => {
        if (index == value) {
          clearInterval(inval);
        } else {
          index += invalValue;
          item.firstElementChild.style.width = `${Math.round(index)}%`;
        }
      }, 100);
    });

    amounts.forEach((item) => {
      let dataValue = item.getAttribute("data-value");
      let numberPattern = /\d+/g;
      let str = dataValue.split(numberPattern)[1];
      let value = dataValue.match(numberPattern);
      let invalValue = value / 8;
      let index = 0;

      let inval = setInterval(() => {
        if (index == value) {
          clearInterval(inval);
        } else {
          index += invalValue;
          item.innerText = Math.round(index) + str;
        }
      }, 120);
    });
  }
});
