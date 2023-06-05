AOS.init();

const productFavorit = document.querySelectorAll(".favorite i:first-of-type");
const listImages = document.querySelectorAll(".showDetails .images ul li img");
const image = document.querySelector(".showDetails .showImage img");

listImages.forEach((ele) => {
  ele.onclick = function () {
    image.classList.add("remove");
    listImages.forEach((ele) => {
      ele.parentElement.classList.remove("active");
    });
    ele.parentElement.classList.add("active");
    setTimeout(() => {
      image.setAttribute("src", ele.getAttribute("src"));
      image.classList.remove("remove");
    }, 700);
  };
});

// productFavorit.forEach((product) => {
//   product.addEventListener("click", function () {
//     this.className = this.classList.contains("active")
//       ? "far fa-heart"
//       : "fas fa-heart active";
//   });
// });

// start user rate
const rate = document.querySelectorAll(".interaction .addReview .rate i");
rate.forEach((ele, index) => {
  ele.onmouseover = function (e) {
    rate.forEach((ele) => {
      ele.classList.remove("active");
    });
    rate.forEach((ele, index2) => {
      if (index >= index2) {
        ele.classList.add("active");
      }
    });
  };
});

// start add review
const revewNotification = document.querySelector(".addReview .notification");
const allReview = document.querySelector(".allReview");
const addReview = document.querySelector(".addReview");
const reviewForm = document.querySelector(".addReview form");
const submitButton = document.querySelector(".addReview form > button");
const formData = Array.from(reviewForm.elements);
const testReview = document.querySelector(
  ".interaction .allReview .testReview"
);
submitButton.onclick = function (e) {
  e.preventDefault();
  if (formData[2].value == "") {
    revewNotification.classList.add("active");
    revewNotification.innerHTML = revewNotification.getAttribute("data-lang");
    setTimeout(() => {
      revewNotification.classList.remove("active");
    }, 3000);
  } else {
    const cloneDiv = testReview.cloneNode(true);
    cloneDiv.querySelector("h4").innerHTML = formData[0].value;
    cloneDiv.querySelector(".date").innerHTML = moment().format("MMM Do YY");
    cloneDiv.querySelector("p").innerHTML = formData[2].value;
    cloneDiv.querySelectorAll(".rate i").forEach((ele, index) => {
      if (index < addReview.querySelectorAll(".row i.active").length) {
        ele.classList.add("active");
      }
    });
    cloneDiv.classList.remove("d-none");
    allReview.appendChild(cloneDiv);
    addReview.querySelectorAll(".row i.active").forEach((ele) => {
      ele.classList.remove("active");
    });
    reviewForm.reset();
  }
};

//  ////////////////////  start chairs Controlle /////////////////////
const productCount = document.querySelectorAll(
  ".showDetails .details .countControl button"
);
productCount.forEach((ele) => {
  ele.onclick = function () {
    if (this.classList.contains("minus")) {
      if (this.parentElement.children[1].value == "1") return;
      this.parentElement.children[1].value =
        +this.parentElement.children[1].value - 1;
    } else {
      this.parentElement.children[1].value =
        +this.parentElement.children[1].value + 1;
    }
  };
});

//////////////////////  start add to cart /////////////////////
let productDetails = document.querySelector(".showDetails .details");
let addTocartButton = productDetails.querySelector(" form > button");
addTocartButton.addEventListener("click", (e) => {
  e.preventDefault();
  let productName = productDetails.querySelector("h2");
  let productPrice = productDetails.querySelector(".price span:first-of-type");
  let productCount = productDetails.querySelector(".countControl input").value;
  let productImage = document.querySelector(".showDetails .showImage img");
  addToCart(productName, productPrice, productCount, productImage);
});
function changeCartCount(type) {
  if (type == "add") {
    numberOfproductInCurt.innerHTML =
      parseInt(numberOfproductInCurt.innerHTML) + 1;
  } else {
    numberOfproductInCurt.innerHTML =
      parseInt(numberOfproductInCurt.innerHTML) - 1;
  }
}
function addToCart(productName, productPrice, productCount, productImage) {
  let myCart = window.localStorage.getItem("shopCart");
  myCart = JSON.parse(myCart);
  const myOrder = {
    id: myCart && myCart.length ? myCart.length : 0,
    name: productName.innerHTML,
    count: parseFloat(productCount),
    image: productImage.getAttribute("src"),
    price: (
      parseFloat(productPrice.innerHTML) * parseFloat(productCount)
    ).toFixed(2),
  };
  if (!myCart) {
    myCart = [myOrder];
    changeCartCount("add");
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
      changeCartCount("add");
      myCart.push(myOrder);
    }
  }
  productDetails.querySelector(".countControl input").value = 1;
  $.notify(
    "The product has been added successfully from shopping basket",
    "success"
  );
  window.localStorage.setItem("shopCart", JSON.stringify(myCart));
}
//  ////////////////////  end add to cart /////////////////////

//  ////////////////////  remove from cart add to cart /////////////////////
function removeFromShopCart(e) {
  const product = e.target.parentElement.parentElement.querySelector(
    ".main .details .name h4"
  );
  let shopCart = window.localStorage.getItem("shopCart");
  shopCart = JSON.parse(shopCart);
  shopCart = shopCart.filter((ele) => {
    if (ele.name != product.innerHTML) {
      return ele;
    }
  });
  window.localStorage.setItem("shopCart", JSON.stringify(shopCart));
  numberOfproductInCurt.innerHTML =
    parseInt(numberOfproductInCurt.innerHTML) - 1;
  $.notify(
    "The product has been deleted successfully from shopping basket",
    "error"
  );
}
//  ////////////////////  remove from cart add to cart /////////////////////

//////////////////// start add to favorit //////////////////////////
const productDetailsFavorit = document.querySelector(".productDetailsFavorit");

//////////////// start productDetailsFavorit //////////////////////////
const relatedProductFavorit = document.querySelectorAll(
  ".relatedProductFavorit"
);
productDetailsFavorit.addEventListener("click", function () {
  addFavorit(
    this,
    this.parentElement.parentElement.querySelector("h2"),
    this.parentElement.parentElement.parentElement.parentElement.querySelector(
      ".showImage img"
    )
  );
});
//////////////// end productDetailsFavorit //////////////////////////

//////////////// start relatedProductFavorit //////////////////////////
relatedProductFavorit.forEach((ele) => {
  ele.onclick = function () {
    console.log(ele);
    addFavorit(
      this,
      this.parentElement.parentElement.querySelector("h4"),
      this.parentElement.parentElement.parentElement.querySelector(
        ".image  img"
      )
    );
  };
});
//////////////// end relatedProductFavorit //////////////////////////

function addFavorit(icon, productName, productImage) {
  let myFavoritCart = window.localStorage.getItem("myFavoritCart");

  if (icon.classList.contains("active")) {
    favoritNumber.innerHTML = parseInt(favoritNumber.innerHTML) - 1;
  } else {
    favoritNumber.innerHTML = parseInt(favoritNumber.innerHTML) + 1;
  }
  icon.className = icon.classList.contains("active")
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
    icon.classList.contains("active")
      ? "The product has been added successfully To favorit cart"
      : "The product has been deleted successfully from favorit cart",
    icon.classList.contains("active") ? "success" : "error"
  );
  window.localStorage.setItem("myFavoritCart", JSON.stringify(myFavoritCart));
}
//////////////////// end add to favorit //////////////////////////

//////////////////////  start relatedProducts product /////////////////////
const relatedProductsProduct = document.querySelectorAll(
  ".relatedProducts .product:not(.product.active) .main"
);
const relatedProductsProductInput = document.querySelectorAll(
  ".relatedProducts .product:not(.product.active) .addWithProduct input"
);
relatedProductsProductInput.forEach((ele, index) => {
  ele.onchange = function (e) {
    relatedProductsProduct[index].classList.toggle("active");

    let productName =
      ele.parentElement.parentElement.querySelector(".details .name h4");
    let productPrice = ele.parentElement.parentElement.querySelector(
      ".details .name span:first-of-type"
    );
    let productCount = 1;
    let productImage =
      ele.parentElement.parentElement.querySelector(".image img");
    if (e.target.checked) {
      addToCart(productName, productPrice, productCount, productImage);
    } else {
      removeFromShopCart(e);
    }
  };
});
//  ////////////////////  end relatedProducts product /////////////////////

/////////////////////////// start similar product /////////////////////////////////////
const AllSimilarProductCart = document.querySelectorAll(
  ".similarProduct .product .backContent .cart"
);
AllSimilarProductCart.forEach((ele) => {
  ele.onclick = function (e) {
    let productName =
      e.target.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
        ".details > h4 a"
      );
    let productPrice =
      e.target.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
        ".details > span"
      );
    let productImage =
      e.target.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
        ".pairant img"
      );

    console.log(productPrice);
    addToCart(productName, productPrice, 1, productImage);
  };
});
/////////////////////////// end similar product /////////////////////////////////////

/////////////////////////// start similar product favorit /////////////////////////////////////
const AllSimilarProductFavorit = document.querySelectorAll(
  ".similarProduct .product .backContent .favorit"
);
AllSimilarProductFavorit.forEach((ele) => {
  ele.onclick = function (e) {
    let productName =
      e.target.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
        ".details > h4 a"
      );

    let productImage =
      e.target.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
        ".pairant img"
      );

    addFavorit(this, productName, productImage);
  };
});
/////////////////////////// end similar product favorit /////////////////////////////////////
