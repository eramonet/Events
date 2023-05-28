///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();

///////////////////////////////////////// AOS ////////////////////////////////

///////////////////////////////////// start change count in orders ////////////////////////////
let AllTotalPrice = document.querySelectorAll(
  ".allOrders .Bill .totalPriceNumber"
);
let allButtonsCount = document.querySelectorAll(
  ".allOrders .orders .count button"
);
let allTrash = document.querySelectorAll(".allOrders .orders .controlle i");
allButtonsCount.forEach((ele) => {
  ele.onclick = changeCount;
});
function changeCount(e) {
  try {
    let orderCount =
      e.target.parentElement.parentElement.parentElement.querySelector(
        ".count input"
      );
    let AllPriceToOrder =
      e.target.parentElement.parentElement.parentElement.querySelector(
        ".controlle .price"
      );
    let productPrice =
      e.target.parentElement.parentElement.parentElement.querySelector(
        ".main .details .price"
      );

    let buttonType = e.target.parentElement.getAttribute("dataAttr");
    productPrice = parseFloat(productPrice.innerHTML);

    if (buttonType == "plus") {
      orderCount.value = +orderCount.value + 1;
    } else {
      if (orderCount.value == 1) return;
      orderCount.value = +orderCount.value - 1;
    }
    AllPriceToOrder.innerHTML = orderCount.value * productPrice + " AED";
    AllTotalPrice.forEach((ele) => {
      if (buttonType == "plus") {
        ele.innerHTML = parseFloat(ele.innerHTML) + productPrice + " AED";
      } else {
        ele.innerHTML = parseFloat(ele.innerHTML) - productPrice + " AED";
      }
    });
  } catch (error) {
    console.log(error);
    // alert(error);
  }
}

allTrash.forEach((ele) => {
  ele.addEventListener("click", function (e) {
    removeOrder(e);
  });
});

function removeOrder(e) {
  try {
    let AllPriceToOrder =
      e.target.parentElement.parentElement.parentElement.querySelector(
        ".controlle .price"
      );
    AllTotalPrice.forEach((ele) => {
      ele.innerHTML =
        parseFloat(ele.innerHTML) -
        parseFloat(AllPriceToOrder.innerHTML) +
        " AED";
    });
    const product = e.target.parentElement.parentElement.parentElement;
    const orderList =
      e.target.parentElement.parentElement.parentElement.parentElement;
    product.remove();
    if (orderList.children.length == 1) {
      orderList.firstElementChild.classList.remove("d-none");
    }
  } catch (error) {
    console.log(error);
  }
}
///////////////////////////////////// end change count in orders ////////////////////////////
