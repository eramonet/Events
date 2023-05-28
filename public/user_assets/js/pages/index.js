//  start carosal home
const carosalItems = document.querySelectorAll(".carosal > .pairant > div");
const carosalControlle = document.querySelectorAll(
  ".carosal > .pairant > ul li"
);
let count = 1;
function changePage() {
  carosalItems.forEach((ele) => {
    ele.classList.remove("active");
  });
  carosalItems[count].classList.add("active");
}
setInterval(function () {
  changePage();
  count = count == carosalItems.length - 1 ? 0 : ++count;
}, 6000);
carosalControlle.forEach((ele) => {
  ele.onclick = function () {
    if (ele.getAttribute("Indicator") == "next") {
      changePage();
      count = count == carosalItems.length - 1 ? 0 : ++count;
    } else {
      changePage();
      count = count == 0 ? carosalItems.length - 1 : --count;
    }
  };
});

///////////////// start icon down

const iconDown = document.querySelectorAll(".carosal > .pairant > div .down");
const eventsCategories = document.querySelector(".eventsCategories");
iconDown.forEach((ele) => {
  ele.onclick = function () {
    window.scrollTo({
      top: eventsCategories.offsetTop - 125,
      behavior: "smooth",
    });
  };
});

//  end carosal

/*----------------- start latestProducts nav -----------------*/
const latestProductsNavLi = document.querySelectorAll(
  ".latestProducts .head ul li"
);

const productFavorit = document.querySelectorAll(
  ".latestProducts .product .favorit i"
);

// ////////////////////////////// start latestProductsNavLi chufel
latestProductsNavLi.forEach((ele) => {
  ele.addEventListener("click", function () {
    latestProductsNavLi.forEach((li) => {
      li.classList.remove("active");
    });
    this.classList.add("active");
  });
});
// ////////////////////////////// start productFavorit
productFavorit.forEach((product) => {
  product.addEventListener("click", function () {
    this.className = this.classList.contains("active")
      ? "far fa-heart"
      : "fas fa-heart active";
  });
});

/*----------------- end latestProducts nav -----------------*/

/*----------------- start title hir video -----------------*/
const titleHer = document.querySelector(".titleHere .content .video");
titleHer.onclick = function () {
  this.classList.toggle("start");
  const video = this.querySelector("video");
  if (video.hasAttribute("controls")) {
    video.removeAttribute("controls");
    video.pause();
  } else {
    video.setAttribute("controls", "");
    video.play();
  }
};

/*----------------- start window scroll -----------------*/

/*----------------- start shareNews -----------------*/
const shareNews = document.querySelectorAll(".shareNews");
const sharBox = document.querySelector(".sharBox");
const closeButtonSharBox = document.querySelector(".sharBox > .content > i");
shareNews.forEach((ele) => {
  ele.onclick = function () {
    sharBox.classList.add("active");
    $("body").css("overflow-y", "hidden");
  };
});
function removeShareBoxActive() {
  sharBox.classList.remove("active");
  $("body").css("overflow-y", "visible");
}
closeButtonSharBox.onclick = removeShareBoxActive;
sharBox.querySelector(".content").onclick = function (e) {
  e.stopPropagation();
};
sharBox.onclick = removeShareBoxActive;
/*----------------- end shareNews  -----------------*/

//////////////////// start add to favorit //////////////////////////
const allProduct = document.querySelectorAll(
  ".latestProducts .products .product .image .options .favorit"
);

function addFavorit(faveIcon, productName, productImage) {
  let myFavoritCart = window.localStorage.getItem("myFavoritCart");
  if (faveIcon.classList.contains("active")) {
    favoritNumber.innerHTML = parseInt(favoritNumber.innerHTML) - 1;
  } else {
    favoritNumber.innerHTML = parseInt(favoritNumber.innerHTML) + 1;
  }
  faveIcon.className = faveIcon.classList.contains("active")
    ? "far fa-heart"
    : "fas fa-heart active";
  myFavoritCart = JSON.parse(myFavoritCart);

  const myFavorit = {
    id: myFavoritCart && myFavoritCart.length ? myFavoritCart.length : 0,
    image: productImage.getAttribute("src"),
    name: productName.innerHTML,
  };
  if (!myFavoritCart) {
    myFavoritCart = [myFavorit];
  } else {
    let test = myFavoritCart.filter((ele, index) => {
      return ele.name != myFavorit.name;
    });
    if (test.length != myFavoritCart.length) {
      myFavoritCart = test;
    } else {
      myFavoritCart.push(myFavorit);
    }
  }

  $.notify("The request has been added successfully", "success");
  window.localStorage.setItem("myFavoritCart", JSON.stringify(myFavoritCart));
}
allProduct.forEach((ele) => {
  ele.onclick = function () {
    let productName =
      this.parentElement.parentElement.parentElement.querySelector(
        ".details .description h4"
      );
    let productImage =
      this.parentElement.parentElement.parentElement.querySelector(
        ".image a img"
      );
    addFavorit(this, productName, productImage);
  };
});
//////////////////// end add to favorit //////////////////////////

//////////////////// start add to cart //////////////////////////
let addTocartButton = document.querySelectorAll(
  ".latestProducts .product .image .options i.cart"
);

addTocartButton.forEach((ele) => {
  ele.addEventListener("click", addToCart);
});
function changeCountCart() {
  const numberOfproductInCurt = document.querySelector(
    ".shoppingCurtIcon + span"
  );
  numberOfproductInCurt.innerHTML =
    parseInt(numberOfproductInCurt.innerHTML) + 1;
}
function addToCart() {
  let myCart = window.localStorage.getItem("shopCart");
  let productName =
    this.parentElement.parentElement.parentElement.querySelector(
      ".details .description h4"
    );
  let productImage =
    this.parentElement.parentElement.parentElement.querySelector(
      ".image a img"
    );
  let productPrice =
    this.parentElement.parentElement.parentElement.querySelector(
      ".details .description .price .realPrice"
    );
  myCart = JSON.parse(myCart);

  const myOrder = {
    id: myCart && myCart.length ? myCart.length : 0,
    name: productName.innerHTML,
    image: productImage.getAttribute("src"),
    count: 1,
    price: parseFloat(productPrice.innerHTML).toFixed(2),
  };
  if (!myCart) {
    myCart = [myOrder];
    changeCountCart();
  } else {
    let test = myCart.filter((ele, index) => {
      return ele.name == myOrder.name;
    });
    if (test.length) {
      myCart[test[0].id].count = myCart[test[0].id].count + myOrder.count;
      myCart[test[0].id].price = (
        parseFloat(myCart[test[0].id].price) + parseFloat(myOrder.price)
      ).toFixed(2);
    } else {
      myCart.push(myOrder);
      changeCountCart();
    }
  }

  $.notify("The request has been added successfully", "success");
  window.localStorage.setItem("shopCart", JSON.stringify(myCart));
}
//////////////////// end add to cart //////////////////////////
