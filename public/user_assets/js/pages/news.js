///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();

///////////////////////////////////////// AOS ////////////////////////////////

///////////////////////////////////////// trendingCarosal  ////////////////////////////////
$(function () {
  $(".trendingCarosal").owlCarousel({
    loop: true,
    autoplay: true,
    margin: 10,
    nav: false,
    mouseDrag: true,
    dotsEach: true,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
    },
  });
});

///////////////////////////////////////// trendingCarosal ////////////////////////////////

///////////////////////// start see more /////////////////////////////////////////////////
const paragraph = document.querySelector(".trending .leftSide .content p");

function changeConetentLength(element) {
  let someData = element;
  someData = element.innerHTML;
  console.log(someData.trim().replace(/([([])\s+|\s+([)\]])/g, "$1$2"));

  someData = someData
    .trim()
    .replace(/([([])\s+|\s+([)\]])/g, "$1$2")
    .split(" ")
    .slice(0, +element.getAttribute("dataCount"))
    .join(" ");
  element.innerHTML = someData;
}

///////////////////////// end see more /////////////////////////////////////////////////

///////////////////////// start window on load /////////////////////////////////////////////////
// window.onload = function () {
//   // changeConetentLength(paragraph);
// };
///////////////////////// end window on load /////////////////////////////////////////////////
