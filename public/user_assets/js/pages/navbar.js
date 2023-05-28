const allNavs = document.querySelector(".allNavs");
const numberOfproductInCurt = document.querySelector(
  ".shoppingCurtIcon + span"
);
const numberOfFavorit = document.querySelector(
  ".navbar .favorit .favorit span"
);
/*////////////////////////////////////// start window scroll //////////////////////////////////////*/
window.onscroll = () => {
  if (window.pageYOffset === 0) {
    $("#upperNavCustom").show(500);
    allNavs.classList.add("active");
    $("#showDetails").css("margin-top", "50px");
  } else if (window.pageYOffset > 5 || window.pageYOffset > 300) {
    $("#upperNavCustom").hide(1000);
    //  $("#upperNavCustom").animate(300, function () {
    //    $(this).hide(1000);
    //  });
    document.body.style.paddingTop = `${allNavs.offsetHeight}px`;
    allNavs.classList.add("active");
    allNavs.css("margin-bottom", "10px");
    $("#showDetails").css("margin-top", "50px");
    if (window.innerWidth < 600) {
      allNavs.classList.add("removeUpper");
    }
  } else {
    // document.body.style.paddingTop = `0px`;
  }
  removeActivation();
};
/*////////////////////////////////////// start window scroll //////////////////////////////////////*/

/*////////////////////////////////////// start footer //////////////////////////////////////*/
const footerEmailInput = document.querySelector("footer .email input");
if (footerEmailInput) {
  footerEmailInput.addEventListener("focus", function () {
    this.parentElement.firstElementChild.classList.add("active");
  });
  footerEmailInput.addEventListener("blur", function () {
    if (!this.value) {
      this.parentElement.firstElementChild.classList.remove("active");
    }
  });
  /*----------------- end footer -----------------*/
}
/*////////////////////////////////////// end footer //////////////////////////////////////*/

////////////////////////////////////////  start smNavIcon icon action //////////////////////////////////////
// const smNavIcon = document.querySelector(".smNav .icon i");
// const smNavlinks = document.querySelector(".navbar .pagesLink");

// smNavIcon.addEventListener("click", (e) => {
//   smNavlinks.classList.toggle("active");
// });
////////////////////////////////////////  end smNavIcon icon action //////////////////////////////////////

/*/////////////////////////// start favorit cart ///////////////////////////*/
const favoritCartIcon = document.querySelector(".navbar .favoritCartIcon");
const favoritCart = document.querySelector(".navbar .favoritCart");
let favoritCartUl = document.querySelector(".navbar .favoritCart ul");
favoritCartIcon.onclick = function (e) {
  /* start stop propagation to favorit CurtIcon */
  shoppingCurt.classList.remove("active");
  userAuth.classList.remove("active");
  // languageContent.classList.remove("active");
  e.stopPropagation();
  /* end stop propagation to favorit CurtIcon */

  myFaveCart = window.localStorage.getItem("myFavoritCart");
  myFaveCart = JSON.parse(myFaveCart);
  myFaveCart = myFaveCart ? myFaveCart : [];
  favoritCart.classList.toggle("active");
  if (favoritCart.classList.contains("active")) {
    favoritCartUl.innerHTML = "";
    if (myFaveCart.length) {
      myFaveCart.forEach((ele) => {
        favoritCartUl.innerHTML += `
        <li>
          <div class="image">
            <img src="${ele.image}" alt="" />
          </div>
          <div class="details">
            <h5>${ele.name}</h5>
          </div>
          <div class="favorit">
            <i onclick="addFavoritNave(event)" class="fas fa-heart active"></i>
          </div>
        </li>
      `;
      });
    } else {
      favoritCartUl.innerHTML += `
        <li class="noProduct">There are no products added to the Favorite basket</li>
      `;
    }
  }
};
/*----------------- end favorit cart -----------------*/

//////////////////// start add to favorit //////////////////////////
const favoritNumber = document.querySelector(
  ".navbar .row div div.favorit ul li.favorit span"
);
function addFavoritNave(e) {
  let productName =
    e.target.parentElement.parentElement.querySelector(".details h5");
  let productImage =
    e.target.parentElement.parentElement.querySelector(".image img");
  let myFavoritCart = window.localStorage.getItem("myFavoritCart");
  myFavoritCart = JSON.parse(myFavoritCart);
  if (e.target.classList.contains("active")) {
    favoritNumber.innerHTML = parseInt(favoritNumber.innerHTML) - 1;
  } else {
    favoritNumber.innerHTML = parseInt(favoritNumber.innerHTML) + 1;
  }
  e.target.className = e.target.classList.contains("active")
    ? "far fa-heart"
    : "fas fa-heart active";

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
    e.target.classList.contains("active")
      ? "The product has been added successfully To favorit cart"
      : "The product has been deleted successfully from favorit cart",
    e.target.classList.contains("active") ? "success" : "error"
  );
  window.localStorage.setItem("myFavoritCart", JSON.stringify(myFavoritCart));
}
//////////////////// end add to favorit //////////////////////////

/*//////////////////// start shoppingCurt ////////////////////*/
const shoppingCurtIcon = document.querySelector(
  ".navbar .favorit .shoppingCurtIcon"
);
const shoppingCurt = document.querySelector(".navbar .favorit .shoppingCurt");
let shoppingCurtUl = document.querySelector(
  ".navbar .favorit .shoppingCurt ul"
);
const totalPrice = document.querySelector(
  ".navbar .favorit .shoppingCurt .totalPrice span:last-of-type"
);



function removeOrder() {
  const trashOrder = document.querySelectorAll(
    ".navbar .favorit .shoppingCurt .controlle > i"
  );
  trashOrder.forEach((ele, index) => {
    ele.addEventListener("click", function (e) {
      e.target.parentElement.parentElement.remove();
      $.notify(
        "The product has been deleted successfully from shopping basket",
        "error"
      );

      let shopCart = window.localStorage.getItem("shopCart");
      shopCart = JSON.parse(shopCart);
      let product =
        e.target.parentElement.parentElement.querySelector(
          ".details .data h5"
        ).innerHTML;
      shopCart = shopCart.filter((ele) => {
        if (ele.name == product) {
          totalPrice.innerHTML =
            (parseFloat(totalPrice.innerHTML) - ele.price).toFixed(2) + " AED";
        }
        return ele.name != product;
      });
      window.localStorage.setItem("shopCart", JSON.stringify(shopCart));
      numberOfproductInCurt.innerHTML =
        parseInt(numberOfproductInCurt.innerHTML) - 1;
    });
  });
}

////////////////////// start navbar button for add count and minus count to order /////////////////////
function orderProductCount() {
  const countControlle = document.querySelectorAll(
    ".navbar .favorit .shoppingCurt ul li button"
  );
  countControlle.forEach((ele) => {
    ele.onclick = function (e) {
      let productName =
        e.target.parentElement.parentElement.parentElement.querySelector(
          ".details .data h5"
        );
      let myShopCart = window.localStorage.getItem("shopCart");
      myShopCart = JSON.parse(myShopCart);
      const input = ele.parentElement.querySelector("input");
      if (ele.getAttribute("data_type") == "minus") {
        if (input.value == "1") {
          e.target.parentElement.parentElement.parentElement.remove();
          myShopCart = myShopCart.filter(
            (ele) => ele.name !== productName.innerHTML
          );
          window.localStorage.setItem("shopCart", JSON.stringify(myShopCart));
          numberOfproductInCurt.innerHTML =
            +numberOfproductInCurt.innerHTML - 1;
          $.notify(
            "The product has been deleted successfully from favorit cart",
            "error"
          );
          return;
        } else {
          input.value = +input.value - 1;
        }
      } else {
        input.value = +input.value + 1;
      }
      myShopCart = myShopCart.map((product) => {
        console.log(productName.innerHTML);
        if (product.name != productName.innerHTML) {
          return product;
        } else {
          let pricePice = product.price / product.count;
          product.count =
            ele.getAttribute("data_type") == "minus"
              ? +product.count - 1
              : +product.count + 1;
          product.price = +(product.count * pricePice).toFixed(2);
          let productPrice =
            e.target.parentElement.parentElement.parentElement.querySelectorAll(
              ".price"
            );
          let totalPrice =
            e.target.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector(
              ".totalPrice span:last-of-type"
            );

          productPrice.forEach((ele) => {
            ele.innerHTML = product.price + " AED";
          });
          totalPrice.innerHTML =
            (ele.getAttribute("data_type") == "minus"
              ? +(parseFloat(totalPrice.innerHTML) - pricePice).toFixed(2)
              : parseFloat(totalPrice.innerHTML) + pricePice) + " AED";
          return product;
        }
      });
      window.localStorage.setItem("shopCart", JSON.stringify(myShopCart));
    };
  });
}
////////////////////// end navbar button for add count and minus count to order /////////////////////

/*///////////////////////// start stop propagation to shoppingCurt /////////////////////// */
/* start stop propagation to shoppingCurt */
shoppingCurt.addEventListener("click", (e) => {
  e.stopPropagation();
});
/* end stop propagation to shoppingCurt */

/* start stop propagation to favorit Curt */
favoritCart.addEventListener("click", function (e) {
  e.stopPropagation();
});
/* end stop propagation to favorit Curt */

/*///////////////////// end stop propagation to shoppingCurtIcon /////////////////////////// */

/*----------------- end shoppingCurt -----------------*/

/*----------------- start user authonticat -----------------*/
const userIcon = document.querySelector(".navbar .user > i");
const userAuth = document.querySelector(".navbar .user .userProfile");
userIcon.onclick = function (e) {
  e.stopPropagation();
  favoritCart.classList.remove("active");
  shoppingCurt.classList.remove("active");
  // languageContent.classList.remove("active");
  userAuth.classList.toggle("active");
};
userAuth.addEventListener("click", function (e) {
  e.stopPropagation();
});
/*----------------- start language translate part -----------------*/
// const languageIcon = document.querySelector(".navbar .languageIcon img");
// const languageContent = document.querySelector(".navbar .languageIcon ul");
// languageIcon.onclick = function (e) {
//   e.stopPropagation();
//   favoritCart.classList.remove("active");
//   shoppingCurt.classList.remove("active");
//   userAuth.classList.remove("active");
//   languageContent.classList.toggle("active");
// };
// languageContent.addEventListener("click", function (e) {
//   e.stopPropagation();
// });

function removeActivation() {
  shoppingCurt.classList.remove("active");
  userAuth.classList.remove("active");
  favoritCart.classList.remove("active");
  // languageContent.classList.remove("active");
}
/*----------------- end user authonticat -----------------*/

/*----------------- start document on click -----------------*/
document.addEventListener("click", function () {
  removeActivation();
});
/*----------------- end document on click -----------------*/

/*----------------- start window load -----------------*/
window.onload = function () {
  let number = JSON.parse(window.localStorage.getItem("shopCart"));
  numberOfproductInCurt.innerHTML = number ? number.length : 0;
  let numberFavorit = JSON.parse(window.localStorage.getItem("myFavoritCart"));
  numberOfFavorit.innerHTML = numberFavorit ? numberFavorit.length : 0;
  /*----------------- start loading page -----------------*/
  const loadingPage = document.querySelector(".loadingPage");
  setTimeout(() => {
    loadingPage.classList.remove("active");
    document.body.classList.add("active");
  }, 2500);
  /*----------------- end loading page -----------------*/
};

/*----------------- end window load -----------------*/
function rotateImage(degree = 360) {
  $("#logo-image").animate(
    { transform: degree },
    {
      step: function (now, fx) {
        $(this).css({
          "-webkit-transform": "rotate(" + now + "deg)",
          "-moz-transform": "rotate(" + now + "deg)",
          transform: "rotate(" + now + "deg)",
        });
      },
    }
  );
}
