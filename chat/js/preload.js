setTimeout(() => {
  document.getElementById("loading").remove();
}, 5000);
setTimeout(function () {
  document.getElementById("content").classList.remove("hidden");
  document.querySelector(".fixed").classList.add("hidden");
}, 2000);
setTimeout(() => {
  document.querySelector(".typewriter").classList.remove("typewriter");
}, 3500);
