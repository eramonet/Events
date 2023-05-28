///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();

///////////////////////////////////////// AOS ////////////////////////////////

////////////////////////////////// start password fild change type /////////////////////////////////
const passwordFild = document.querySelector(".login .passwordFild");
const icon = passwordFild.querySelector("i");
const input = passwordFild.querySelector("input");
icon.onclick = function () {
  if (icon.classList.contains("active")) {
    icon.className = "far fa-eye-slash";
    input.setAttribute("type", "password");
  } else {
    icon.className = "fas fa-eye active";
    input.setAttribute("type", "text");
  }
};
////////////////////////////////// start password fild change type /////////////////////////////////

////////////////////////////////// start validation fild change type /////////////////////////////////
let emailValidation = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const supmitButton = document.querySelector(
  ".login .content form button:nth-of-type(1)"
);
const allNotification = document.querySelectorAll(
  ".login .content form .input"
);
const emailNotification = allNotification[0].querySelector(".notification");
const passwordNotification = allNotification[1].querySelector(".notification");

const emailField = document.querySelector(
  ".login .content form .input [type=email]"
);
const passwordField = document.querySelector(
  ".login .content form .input [type=password]"
);

function doNotification(field, message, button) {
  button.style.pointerEvents = "none";
  field.classList.add("active");
  field.innerHTML = message;
  setTimeout(() => {
    field.classList.remove("active");
    setTimeout(() => {
      field.innerHTML = "";
      button.style.pointerEvents = "auto";
    }, 800);
  }, 4000);
}

supmitButton.onclick = function (e) {
  e.preventDefault();
  if (!passwordField.value) {
    doNotification(passwordNotification, "enter your password", this);
  }

  if (!emailField.value) {
    doNotification(emailNotification, "enter your email", this);
  } else if (!emailValidation.test(emailField.value)) {
    doNotification(emailNotification, "enter valid email", this);
  }
};
////////////////////////////////// end validation fild change type /////////////////////////////////
