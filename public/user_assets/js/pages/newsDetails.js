///////////////////////////////////////// AOS ////////////////////////////////
AOS.init();

///////////////////////////////////////// AOS ////////////////////////////////

///////////////////////////////////////// start play video ////////////////////////////////
const videoContainer = document.querySelector(".show .content .video");
const video = videoContainer.querySelector("video");
const over = videoContainer.querySelector(".over");
videoContainer.addEventListener("click", () => {
  over.classList.toggle("active");
  if (over.classList.contains("active")) {
    video.pause();
    video.removeAttribute("controls");
  } else {
    video.play();
    video.setAttribute("controls", "");
  }
});
///////////////////////////////////////// end play video ////////////////////////////////

///////////////////////////////////////// start reactions ////////////////////////////////
const reactions = document.querySelectorAll(
  ".newsDetails .reactions .reaction"
);

reactions.forEach((ele) => {
  ele.addEventListener("click", () => {
    reactions.forEach((ele2) => {
      ele2.classList.remove("active");
    });
    ele.classList.add("active");
  });
});
///////////////////////////////////////// end reactions ////////////////////////////////
