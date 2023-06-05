///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();

///////////////////////////////////////// AOS ////////////////////////////////

////////////////////////////////// start password fild change type /////////////////////////////////
const icon = document.querySelectorAll(".signUp .passwordFild i");
const input = document.querySelectorAll(".signUp .passwordFild input");

icon.forEach((ele, index) => {
  ele.onclick = function () {
    if (ele.classList.contains("active")) {
      ele.className = "far fa-eye-slash";
      input[index].setAttribute("type", "password");
    } else {
      ele.className = "fas fa-eye active";
      input[index].setAttribute("type", "text");
    }
  };
});

////////////////////////////////// start password fild change type /////////////////////////////////

////////////////////////////////// start validation fild change type /////////////////////////////////
let emailValidation = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
let passwordValidation = /[0-9a-zA-Z]{6,}/;
const supmitButton = document.querySelector(
  ".signUp .content form button:nth-of-type(1)"
);
console.log(supmitButton);
const allNotification = document.querySelectorAll(
  ".signUp .content form .input"
);
console.log(allNotification);
const nameNotification = allNotification[0].querySelector(".notification");
const emailNotification = allNotification[1].querySelector(".notification");
const passwordNotification = allNotification[2].querySelector(".notification");
const resetPasswordNotification =
  allNotification[3].querySelector(".notification");

const nameField = document.querySelector(
  ".signUp .content form .input [id=name]"
);
const emailField = document.querySelector(
  ".signUp .content form .input [type=email]"
);
const passwordField = document.querySelector(
  ".signUp .content form .input [type=password]"
);
const resetPasswordField = document.querySelector(
  ".signUp .content form .input [id=repeatPassword]"
);
function doNotification(field, message) {
  supmitButton.style.pointerEvents = "none";
  field.classList.add("active");
  field.innerHTML = message;
  setTimeout(() => {
    field.classList.remove("active");
    setTimeout(() => {
      field.innerHTML = "";
      supmitButton.style.pointerEvents = "auto";
    }, 800);
  }, 4000);
}

supmitButton.onclick = function (e) {
  e.preventDefault();
  if (!nameField.value) {
    doNotification(nameNotification, "enter your name");
  }

  if (!emailField.value) {
    doNotification(emailNotification, "enter your email");
  } else if (!emailValidation.test(emailField.value)) {
    doNotification(emailNotification, "enter valid email");
  }

  if (!passwordField.value) {
    doNotification(passwordNotification, "enter your password");
  } else if (!passwordValidation.test(passwordField.value)) {
    doNotification(
      passwordNotification,
      "you should enter at least 6 character"
    );
  }

  if (resetPasswordField.value !== passwordField.value) {
    doNotification(
      resetPasswordNotification,
      "your password should be matched"
    );
  }
};
////////////////////////////////// end validation fild change type /////////////////////////////////
