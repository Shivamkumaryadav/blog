const sidebar = document.querySelector("#sidebar");
const menu = document.querySelector("#sidebar-toggle");
const closeSidebar = document.querySelector("#close-sidebar");

menu.addEventListener("click", () => {
    sidebar.classList.toggle("hidden");
});

closeSidebar.addEventListener("click", () => {
    sidebar.classList.toggle("hidden");
});

