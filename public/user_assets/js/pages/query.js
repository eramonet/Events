///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();
///////////////////////////////////////// AOS ////////////////////////////////

const controllers = document.querySelectorAll(".querys header ul li ");
const allPages = document.querySelectorAll(".querys .pages .page");

controllers.forEach((ele, i) => {
  ele.onclick = function () {
    controllers.forEach((ele) => {
      ele.classList.remove("active");
    });
    ele.classList.add("active");
    changePages(i);
  };
});

function changePages(i) {
  allPages.forEach((ele) => {
    ele.classList.remove("active");
  });
  allPages[i].classList.add("active");
}
////////////////////////////////////////////// start add query ////////////////////////////////////////////
const newQuerysPage = document.querySelector(".querys .new");
const querys = document.querySelectorAll(".querys .new .query");
const addQueryButton = newQuerysPage.querySelector(".addQuery button");
const addMessageOver = document.querySelector(".addMessageOver");
const addMessageForm = addMessageOver.querySelector("form");
////////////// start inputs and form buttons
const addMessageFormButton = addMessageOver.querySelector(
  "form .footer button"
);
const addMessageFormInput = addMessageOver.querySelector("form .content input");
const addMessageFormTextarea = addMessageOver.querySelector(
  "form .content textarea"
);
////////////// start inputs and form buttons

const addMessageCloseIcon = addMessageOver.querySelector("header i");

function removeOverActivate() {
  addMessageOver.classList.remove("active");
}

addQueryButton.addEventListener("click", function () {
  addMessageOver.classList.add("active");
});

addMessageForm.addEventListener("click", function (e) {
  e.stopPropagation();
});
addMessageOver.addEventListener("click", removeOverActivate);
addMessageCloseIcon.addEventListener("click", removeOverActivate);

addMessageFormButton.addEventListener("click", function (e) {
  e.preventDefault();
  if (!addMessageFormInput.value || !addMessageFormTextarea.value) {
    $.notify(
      "you should enter your query head and your query content",
      "error"
    );
  } else {
    const cloneDiv = querys[0];
    cloneDiv.querySelector("h4").innerHTML = addMessageFormInput.value;
    cloneDiv.querySelector("p").innerHTML = addMessageFormTextarea.value;
    cloneDiv.querySelector("span").innerHTML = "New Message";
    newQuerysPage.insertBefore(cloneDiv, querys[1]);
    removeOverActivate();
  }
});
querys.forEach((ele) => {
  ele.addEventListener("click", function () {
    changePages(3);
  });
});

////////////////////////////////////////////// start add message ////////////////////////////////////////////
const queryChat = document.querySelector(".querys .pages .queryChat");
const messages = document.querySelector(".querys .pages .messages ul");
const queryForm = queryChat.querySelector(".chate .send form");
const message = queryForm.querySelector("input[type=text]");
const button = queryForm.querySelector("button");
const testMessage = queryChat.querySelector(".messages .testMessage ");
function addMessage(e) {
  if (!message.value) {
    $.notify("you should enter message content", "error");
  }
  const messageClone = testMessage.cloneNode(true);
  messageClone.classList.remove("d-none");
  messageClone.querySelector(".content div.text").innerHTML = message.value;
  message.value = "";
  messageClone.querySelector(" .date span").innerHTML = moment().fromNow();
  messages.appendChild(messageClone);
}
button.addEventListener("click", function (e) {
  e.preventDefault();
  addMessage();
});
////////////////////////////////////////////// end add message ////////////////////////////////////////////

////////////////////////////////////////////// end add query ////////////////////////////////////////////
