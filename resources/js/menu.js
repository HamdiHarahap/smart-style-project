const btnMenu = document.querySelector(".btn-menu");
const listMenu = document.querySelector(".menu-list");

btnMenu.addEventListener("click", () => {
    listMenu.classList.toggle("max-[520px]:hidden");
});
