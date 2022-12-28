const btnDelete = document.querySelectorAll(".pages__actions__button--delete");

btnDelete.forEach(function (e) {
  e.addEventListener("click", function () {
    let id = e.target.getAttribute("data-delete-id");
    document.querySelector(".pages__actions__delete").style.display = "block";
    console.log(id);
  });
});

const btnClose = document.getElementById("dashboard__notification__close");
const modal = document.querySelector(".dashboard__notification");
btnClose.addEventListener("click", function () {
  modal.style.display = "none";
});
