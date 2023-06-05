///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();

///////////////////////////////////////// AOS ////////////////////////////////

// start change date input /////////////////////////////
const dateFiled = document.querySelector(
  ".checkOut .personalData .input .overInput [type=date]"
);

dateFiled.onchange = function (e) {
  const input = e.target.parentElement.parentElement.querySelector("input");
  input.value = e.target.value;
};

//////////////////////////// start change pages ///////////////////////////
const controller = document.querySelectorAll(".checkOut .controller ");
const pages = document.querySelectorAll(".checkOut .content > div");
const indecators = document.querySelectorAll(
  ".checkOut .container .indecators > span"
);
let count = 0;

indecators.forEach((ele) => {
  ele.onclick = function () {
    if (ele.getAttribute("dataAttr") == "next") {
      if (count == 2) return;
      ++count;
      changePages(count);
    } else {
      if (count == 0) return;
      --count;
      changePages(count);
    }
  };
});

controller.forEach((ele, i) => {
  ele.onclick = function () {
    changePages(i);
  };
});

function changePages(index) {
  controller.forEach((controll) => {
    controll.classList.remove("active");
  });
  pages.forEach((page) => {
    page.classList.remove("active");
  });
  controller.forEach((controlle, pageIndex) => {
    if (pageIndex <= index) {
      controlle.classList.add("active");
    }
  });
  pages[index].classList.add("active");
}

//////////////////////////// end change pages ///////////////////////////
