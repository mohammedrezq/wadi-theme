const mobileSearch = (e) => {
    const searchIcon = document.querySelector(".search-mobile-icon");
    const searchMobileForm = document.querySelector(".search-form-container");
  
    let menuOpen = false;
  
    window.addEventListener("click", function (e) {
      if (searchIcon.contains(e.target)) {
        menuOpen = !menuOpen;
        searchMobileForm.classList.toggle("active");
        // Clicked in box
      } else if (searchMobileForm.contains(e.target)) {
        menuOpen = true;
        searchMobileForm.classList.add("active");
      } else {
        // Clicked outside the box
        menuOpen = false;
        searchMobileForm.classList.remove("active");
      }
  
      searchIcon.innerHTML = menuOpen ? `<i style="height:30px;" class="fas fa-times"></i>` : `<i style="height:30px;" class="fas fa-search"></i>`;
    });
  
    window.addEventListener("resize", function () {
      menuOpen = false;
      if(searchMobileForm) {
        searchMobileForm.classList.remove("active");
      }
      searchIcon.innerHTML = menuOpen ? `<i style="height:30px;" class="fas fa-times"></i>` : `<i style="height:30px;" class="fas fa-search"></i>`;
    });
  };
  mobileSearch();
  