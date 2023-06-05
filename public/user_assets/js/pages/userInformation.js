///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();

///////////////////////////////////////// AOS ////////////////////////////////

////////////////////////////////// start validation fild change type /////////////////////////////////

const dateFiled = document.querySelector(
  ".userInformation .content form .input.dateFiled > div"
);
const dateFiledInputs = dateFiled.querySelectorAll("input");

const supmitButton = document.querySelector(
  ".userInformation .content form button:nth-of-type(1)"
);

const allNotification = document.querySelectorAll(
  ".userInformation .content form .input"
);

const nameNotification = allNotification[0].querySelector(".notification");
const DateNotification = allNotification[1].querySelector(".notification");
const AddresNotification = allNotification[2].querySelector(".notification");
const numberNotification = allNotification[3].querySelector(".notification");

const nameField = document.querySelector(
  ".userInformation .content form .input [id=name]"
);
const DateField = document.querySelector(
  ".userInformation .content form .input [name=date]"
);
const AddresField = document.querySelector(
  ".userInformation .content form .input [id=addres]"
);
const numberField = document.querySelector(
  ".userInformation .content form .input [id=phone]"
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
  console.log(DateField.value);

  if (!DateField.value) {
    doNotification(DateNotification, "enter your Date");
  }

  if (!AddresField.value) {
    doNotification(AddresNotification, "enter your Addres");
  }
  if (!numberField.value) {
    doNotification(numberNotification, "your phone number");
  }
};

dateFiledInputs[1].onchange = function (e) {
  dateFiledInputs[0].value = e.target.value;
};
////////////////////////////////// end validation fild change type /////////////////////////////////
