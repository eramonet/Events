///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();

///////////////////////////////////////// AOS ////////////////////////////////

const forgetPasswordInput = document.querySelectorAll(
  ".forgetPassword .content .inputs input"
);
forgetPasswordInput.forEach((element, index) => {
  element.oninput = function () {
    console.log(element);
    forgetPasswordInput[index].blur();
    if (index + 1 != forgetPasswordInput.length) {
      forgetPasswordInput[index + 1].focus();
    }
  };
});
