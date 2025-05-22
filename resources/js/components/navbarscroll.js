export function initNavbarScroll() {
  document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("mainNav");

    window.addEventListener("scroll", function () {
      if (window.scrollY > 50) {
        navbar.classList.add("navbar-scrolled");
      } else {
        navbar.classList.remove("navbar-scrolled");
      }
    });

    if (window.scrollY > 50) {
      navbar.classList.add("navbar-scrolled");
    }
  });
}