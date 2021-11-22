const mobileHeader = (e) => {
  const hamburgerIcon = document.querySelector(".header-mobile-icon");
  const navgiationMenu = document.querySelector(".main-navigation");

  const headerSiteBranding = document.querySelector(".site-branding");
  const headerDesktop = document.querySelector(".header-desktop");
  const siteMain = document.querySelector(".site-main");

  let menuOpen = false;

  window.addEventListener("click", function (e) {
    if (hamburgerIcon.contains(e.target)) {
      menuOpen = !menuOpen;
      navgiationMenu.classList.toggle("active");
      // Clicked in box
    } else if (navgiationMenu.contains(e.target)) {
      menuOpen = true;
      navgiationMenu.classList.add("active");
    } else {
      // Clicked outside the box
      menuOpen = false;
      navgiationMenu.classList.remove("active");
    }

    hamburgerIcon.innerHTML = menuOpen
      ? `<i style="height:30px;" class="fas fa-times"></i>`
      : `<i style="height:30px;" class="fas fa-bars"></i>`;
  });

  window.addEventListener("resize", function () {
    menuOpen = false;
    navgiationMenu.classList.remove("active");
    hamburgerIcon.innerHTML = menuOpen
      ? `<i style="height:30px;" class="fas fa-times"></i>`
      : `<i style="height:30px;" class="fas fa-bars"></i>`;
  });
};
mobileHeader();
