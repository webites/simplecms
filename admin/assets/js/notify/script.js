const btnDelete = document.querySelectorAll(".pages__actions__button--delete");

btnDelete.forEach(function (e) {
  e.addEventListener("click", function () {
    btnDelete.classList.toggle("pages__actions__delete--active");
  });
});

const btnClose = document.getElementById("dashboard__notification__close");
const modal = document.querySelector(".dashboard__notification");
btnClose.addEventListener("click", function () {
  modal.style.display = "none";
});
