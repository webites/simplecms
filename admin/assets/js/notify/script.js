const btn = document.getElementById("dashboard__notification__close");
const modal = document.querySelector(".dashboard__notification");
btn.addEventListener("click", function () {
  modal.style.display = "none";
});
