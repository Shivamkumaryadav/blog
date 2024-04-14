import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// post blog home page

const navbarOpen = document.querySelector("#navbar-open");
const navbar = document.querySelector("#navbar");
const navbarLink = document.querySelector("#navbar-link");
const closeNavbar = document.querySelector("#close-navbar");

navbarOpen.addEventListener("click", () => {
    navbar.classList.remove("hidden", "w-full");
    navbarLink.classList.add(
        "w-full",
        "bg-white",
        "h-screen",
        "flex-col",
        "fixed",
        "top-0",
        "left-0",
        "px-6",
        "py-5"
    );
    // navbar.classList.toggle("flex-col");
});

closeNavbar.addEventListener("click", () => {
    navbar.classList.toggle("hidden");
});

// category select option
const allCategory = document.querySelector("#all-category");
const categories = document.querySelector("#category");
const categoryLink = document.querySelectorAll(".category-links");
// console.log(categoryLink);
categoryLink.forEach((link) => {
    categories.addEventListener("change", () => {
        const selectedCategory = categories.value;
        if (selectedCategory == "All") {
                window.location.href = "/";
        } else {
            window.location.href = "/?category=" + selectedCategory;
        }
    });
});
