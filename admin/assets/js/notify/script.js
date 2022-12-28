const btnDelete = document.querySelectorAll(".pages__actions__button--delete");

btnDelete.addEventListener("click", function (e) {
  e.forEach(function () {
    document.querySelector(".pages__actions__delete").style.display = "block";
  });
});

const btnClose = document.getElementById("dashboard__notification__close");
const modal = document.querySelector(".dashboard__notification");
btnClose.addEventListener("click", function () {
  modal.style.display = "none";
});
