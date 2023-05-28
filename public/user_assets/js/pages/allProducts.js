///////////////////////////////////////// start chufel ////////////////////////////////
var containerEl = document.querySelector("#containermix");
var mixer = mixitup(containerEl);
///////////////////////////////////////// end chufel ////////////////////////////////
///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();

//   ///////////// start latestProducts search input focus effect
const inputSearch = document.querySelector(".latestProducts .search input");
inputSearch.onfocus = function () {
  this.parentElement.classList.add("active");
};
inputSearch.onblur = function () {
  this.parentElement.classList.remove("active");
};
//   ///////////// start latestProducts search input focus effect
const productFavorit = document.querySelectorAll(
  ".latestProducts .product .image .options i.favorit"
);
productFavorit.forEach((product) => {
  product.addEventListener("click", addFavorit);
});

//////////////////// start add to favorit //////////////////////////
function addFavorit() {
  let productName =
    this.parentElement.parentElement.parentElement.querySelector(
      ".details .description h4"
    );
  let productImage =
    this.parentElement.parentElement.parentElement.querySelector(
      ".image a img"
    );
  let myFavoritCart = window.localStorage.getItem("myFavoritCart");
  if (this.classList.contains("active")) {
    favoritNumber.innerHTML = parseInt(favoritNumber.innerHTML) - 1;
  } else {
    favoritNumber.innerHTML = parseInt(favoritNumber.innerHTML) + 1;
  }
  this.className = this.classList.contains("active")
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

  $.notify(
    this.classList.contains("active")
      ? "The product has been added successfully To favorit cart"
      : "The request has been removed successfully from favorit cart",
    this.classList.contains("active") ? "success" : "error"
  );
  window.localStorage.setItem("myFavoritCart", JSON.stringify(myFavoritCart));
}
//////////////////// end add to favorit //////////////////////////
//////////////////////  start add to cart ///////////////////////
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

  $.notify(
    "The product has been added successfully shopping basket",
    "success"
  );
  window.localStorage.setItem("shopCart", JSON.stringify(myCart));
}
//////////////////////  end add to cart /////////////////////

//////////////////////////////// start latestProductsNavLi chufel ////////////////////////
const latestProductsNavLi = document.querySelectorAll(
  ".latestProducts .head ul li"
);

latestProductsNavLi.forEach((ele) => {
  ele.addEventListener("click", function () {
    latestProductsNavLi.forEach((li) => {
      li.classList.remove("active");
    });
    this.classList.add("active");
  });
});
